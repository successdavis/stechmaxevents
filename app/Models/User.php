<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Debitcard;
use App\Models\Payment;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
    ];

    protected $appends = ['isRegistered'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'     => 'datetime',
        'events_notification'   => 'boolean',
        'newsletter_notification'   => 'boolean'
    ];

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function debitcards() {
        return $this->hasMany(Debitcard::class);
    }

    public function updatePaystackId($paystackId)
    {
        if (empty($this->paystack_id)) {
            return $this->update([
                'paystack_id' => $paystackId
            ]);
        }
        return true;
    }

    public function isRegistered() {
        return $this->payments()->exists();
    }

    public function getIsRegisteredAttribute() {
        return $this->isRegistered();
    }

    public function country() {
        return $this->belongs(Country::class);
    }

    public function getAvatarPathAttribute($avatar)
    {
        if ($avatar) {
            return asset('storage/' . $avatar);
        }else {
            return asset('storage/avatars/default.jpg');
        }
    }
}
