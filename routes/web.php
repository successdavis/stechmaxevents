<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('/dashboard', 'DashboardController@index')->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/initializepayment', 'PaymentController@index');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
Route::get('/updateprofile', 'ProfileController@show')->middleware(['auth', 'verified'])->name('updateprofile');
Route::post('/updateprofile/save', 'ProfileController@profile')->middleware(['auth', 'verified'])->name('saveprofile');
Route::post('/update-personal-information', 'ProfileController@personalInformation')->middleware(['auth', 'verified'])->name('update-personal-information');
Route::post('/notification-settings', 'ProfileController@notificationSettings')->middleware(['auth', 'verified'])->name('notification-settings');
Route::get('/countries', 'CountryController@index')->name('getcountries');

Route::post('/api/{user}/avatar', 'UserAvatarController@store')->name('useravatar');

require __DIR__.'/auth.php';

