<?php

namespace App\Http\Responses;

use Filament\Http\Responses\Auth\Contracts\LogoutResponse as Responsable;

class LogoutResponse implements Responsable
{
    public function toResponse($request): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('home');
    }
}
