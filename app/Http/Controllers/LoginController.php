<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse|\Illuminate\Http\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToGoogleCallback(): \Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $this->_registerLoginUser($user);

        return redirect()->route('home');
    }

    public function _registerLoginUser($data): void
    {
        $user = User::where('email', $data->email)->first();

        if (!$user) {
            $user              = new User();
            $user->name        = $data->name;
            $user->email       = $data->email;
            $user->provider_id = $data->id;
            $user->save();
        }

        Auth::login($user);
    }
}
