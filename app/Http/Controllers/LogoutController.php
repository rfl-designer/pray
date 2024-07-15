<?php

namespace App\Http\Controllers;

use Filament\Facades\Filament;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        Filament::auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home.user');
    }
}
