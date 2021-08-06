<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public function events() {
        return $this->belongsToMany(Event::class)->withPivot('venue', 'url','date','time','max_capacity');
    }
}
