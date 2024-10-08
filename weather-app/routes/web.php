<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WeatherSearchController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route, accessible only by authenticated and verified users
Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Weather search route, accessible only by authenticated users
Route::post('/weather-search', [WeatherSearchController::class, 'search'])
    ->middleware(['auth'])
    ->name('weather.search');

// Profile routes, accessible only by authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes generated by Laravel Breeze (including email verification)
require __DIR__.'/auth.php';
