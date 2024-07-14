<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/login/google', [\App\Http\Controllers\LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [\App\Http\Controllers\LoginController::class, 'redirectToGoogleCallback']);

require __DIR__ . '/auth.php';
