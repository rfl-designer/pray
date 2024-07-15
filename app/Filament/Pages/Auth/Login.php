<?php

namespace App\Filament\Pages\Auth;

use App\Forms\Components\GoogleLoginButton;
use Filament\Forms\Form;
use Filament\Pages\Auth\Login as FilamentLogin;

class Login extends FilamentLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                GoogleLoginButton::make('google')
                    ->label(''),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ]);
    }
}
