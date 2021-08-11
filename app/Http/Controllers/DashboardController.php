<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

class DashboardController extends Controller
{
    
    public function index() {
        return Inertia::render('Dashboard', [
            'isRegistered'      => auth()->user()->isRegistered(),
            'paymentsuccessful'  => false,
        ]);
    }
}
