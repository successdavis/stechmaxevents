<?php

namespace App\Models;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function channels() {
        return $this->belongsToMany(Channel::class)->withPivot('venue', 'url','date','time','max_capacity');
    }
}
