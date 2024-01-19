<?php

namespace App\Livewire;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgetResetAccountController extends Component
{
    public $email, $password, $password_confirmation, $token;
    public $resetMode = false; // false => forget password , true => reset password
    public $reset_success = false;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function mount()
    {
        if (request()->route('token')) {
            $this->email = request()->query('email');
            $this->token = request()->route('token');
            $this->resetMode = true;
        }
    }
    public function render()
    {
        return view('livewire.forget-reset-account-controller')->layout('layouts.app');
    }
    public function forgetpassword(UserRepository $userService)
    {
        $input  = $this->validateOnly('email');
        if (!$userService->get()->where('email', $this->email)->exists()) {
            $this->addError('email', 'Email does not exist');
            return;
        }
        $user = $userService->get()->where('email', $this->email)->first();
        $token = Password::createToken($user);
        $user->User::where('email', $this->email)->update(['token' => $token]);
        $link = route('account.auth.reset', 'token=' . $token . '&email=' . $this->email);
        return view('auth.passwords.email', ['success' => 'Reset link sent to your email:' . $link]);
    }


    public function sendPasswordResetLink(UserRepository $userService)
    {
        $this->validate([
            'email' => 'required|email',
        ]);
        if (!$userService->get()->where('email', $this->email)->exists()) {
            $this->addError('email', 'Email does not exist');
            return;
        }
        $status = Password::sendResetLink(
            ['email' => $this->email]
        );

        if ($status === Password::RESET_LINK_SENT) {
            $this->reset_success=true;
            session()->flash('success', 'Password Reset link sent Successfully!!');            
        } else {
            $this->addError('email', __($status));
        }
    }
    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            ['email' => $this->email, 'token' => $this->token, 'password' => $this->password],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => \Illuminate\Support\Str::random(60),
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            $this->reset_success=true;
            session()->flash('success', 'Your Password was reset Successfully!!');
            $this->dispatch('passwordReset');
        } else {
            $this->addError('email', __($status));
        }
    }
}
