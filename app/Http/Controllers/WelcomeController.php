<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index() {
        $events = Event::all();
        $currentEvent = Event::latest()->first();
        return Inertia::render('Welcome', [
            'canLogin'      => Route::has('login'),
            'canRegister'   => Route::has('register'),
            'events'        => $events,
            'currentevent'  => $currentEvent,
        ]);
    }
}
