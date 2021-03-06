<?php

namespace App\Models;

use App\Models\Channel;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function payment() {
        return $this->hasOne(Payment::class);
    }
}
