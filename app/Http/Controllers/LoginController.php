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

    public function redirectToGoogleCallback(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
    {
        $user = Socialite::driver('google')->user();
        $this->_registerOrLoginUser($user);

        return redirect('/');
    }

    public function _registerOrLoginUser(\Laravel\Socialite\Contracts\User $data): void
    {
        /** @var User $user */
        $user = User::where('email', $data->email)->first();

        if (!$user) {
            $user              = new User();
            $user->name        = $data->name;
            $user->email       = $data->email;
            $user->provider_id = $data->id;
            $user->avatar      = $data->avatar;
            $user->save();
        }

        Auth::login($user);
    }
}
