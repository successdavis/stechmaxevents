<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function show(User $user) {
        return Inertia::render('UpdateProfile', [

        ]);
    }

    public function profile(Request $request) {
        $request->validate([
            'about'     => 'required',
            'website'   => 'nullable'
        ]);
        $user = auth()->user();

        $user->website = $request->website;
        $user->about  = $request->about;

        $user->save();

        return response(200);
    }

    public function personalInformation(Request $request) {
        $request->validate([
            'fullname'      => 'required',
            'phone'     => 'required',
            'country'   => 'required',
            'dob'       => 'required',
        ]);

        $user = auth()->user();

        $user->name     = $request->fullname;
        $user->phone    = $request->phone;
        $user->country_id  = $request->country;
        $user->state    = $request->state;
        $user->city     = $request->city;
        $user->postal   = $request->postal;
        $user->dob      = $request->dob;

        $user->save();

        return response(201);
    }

    public function notificationSettings(Request $request) {

        $user = auth()->user();

        $user->newsletter_notification  = $request->newsnotification;
        $user->events_notification      = $request->eventnotification;

        $user->save();

        return response(201);
    }
}
