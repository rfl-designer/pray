<?php

use App\Http\Controllers\PushController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::middleware(\Filament\Http\Middleware\Authenticate::class)->group(function () {

    Route::post('/push', [PushController::class, 'store']);

    Route::get('/push', [PushController::class, 'push'])->name('push');

    Volt::route('/{id}', 'pray-now')->name('home');
    Volt::route('/', 'welcome')->name('home.user');
});
