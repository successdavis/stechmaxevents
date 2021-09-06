<?php

namespace App\Http\Controllers;

use App\Models\Debitcard;
use App\Models\Event;
use App\Models\Payment;
use App\Traits\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


class PaymentController extends Controller
{
    use Paystack;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $event = Event::latest()->first();

        $reference_num = rand(10*45, 100*98);
        $data = [
            "amount" => $event->amount,
            "key" => getenv('PAYSTACK_SECRET_KEY'),
            "email" => auth()->user()->email ? auth()->user()->email : 'support@stechmax.com',
            "callback_url" => getenv('DOMAIN_NAME') . '/payment/callback',
            "metadata" => [
                'event_id' => $event->id,
                'purpose' => 'Event Ticket',
            ],
        ];

        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($data);

        $responds = $this->makePaystackRequest($url, $fields_string);

        dd($responds);

        return redirect($responds['data']['authorization_url']);
    }

    public function handleGatewayCallback(Request $request)
    {
        $paymentDetails = $this->verifyTransaction($request->reference);

        if (Payment::where('transaction_ref', $paymentDetails['data']['reference'])->exists()) {
            return response('payment already exists', 403);
        }

        if (!$paymentDetails) {
            abort(400, 'Invalid Transaction');
        }

        $card = $this->saveCardDetails($paymentDetails['data']['authorization']);

        $payment = $this->recordPayment($paymentDetails);

        request()->user()->updatePaystackId($paymentDetails['data']['customer']['customer_code']);

        return Inertia::render('Dashboard', [
            'isRegistered'      => false,
            'paymentsuccessful'  => true,
        ]);
    }

    public function recordPayment($paymentDetails) {

        $payment                    = new Payment();
        $payment->amount            = $paymentDetails['data']['amount'];
        $payment->user_id           = auth()->user()->id;
        $payment->transaction_ref   = $paymentDetails['data']['reference'];
        $payment->purpose           = $paymentDetails['data']['metadata']['purpose'];
        $payment->event_id          = $paymentDetails['data']['metadata']['event_id'];

        $payment->save();

        return $payment;
    }

    public function saveCardDetails($cardDetails)
    {

        if (Debitcard::findCard($cardDetails['signature'])->get()->isEmpty()) {
            $card = Debitcard::saveCardDetails($cardDetails);

            return $card;
        }
        
        $card = Debitcard::findCard($cardDetails['signature']);
        return $card;
    }
}
