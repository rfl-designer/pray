<?php

use App\Http\Controllers\PushController;
use Illuminate\Support\Facades\Route;

//Route::view('/', 'welcome');
\Livewire\Volt\Volt::route('/', 'welcome')->middleware('auth')->name('home');
\Livewire\Volt\Volt::route('/{id}', 'pray-now')->middleware('auth')->name('home.pray');

Route::post('/push', [PushController::class, 'store'])->middleware('auth');
Route::get('/push', [PushController::class, 'push'])->middleware('auth');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/login/google', [\App\Http\Controllers\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [\App\Http\Controllers\LoginController::class, 'redirectToGoogleCallback']);

require __DIR__ . '/auth.php';
