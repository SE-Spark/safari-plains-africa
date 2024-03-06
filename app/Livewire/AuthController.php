<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class AuthController extends Component
{
    public $first_name, $last_name, $phone, $email, $password, $password_confirmation;
    public $loginMode = true;
    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount($account)
    {
        if($account !== null && $account === 'signup'){
            $this->loginMode = false;
        }
    }

    public function render()
    {
        return view('livewire.auth')->layout('layouts.app');
    }

    public function login()
    {
        // $this->password = Hash::make($this->password); 

        // \App\Models\User::create(['first_name' => 'SE', 'last_name' => 'Admin', 'email' => $this->email,'password' => $this->password]);

        $this->validate();

        if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {    
            $this->dispatch('showToast', ['message' => "You are Login successful.",'type'=>'success']);
            $this->redirect(route('admin.dashboard'), navigate: false);
        } else {
            session()->flash('error', 'email and password are wrong.');
        }
    }

    public function register()
    {


        $data = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'password' => ['required', Password::min(6)->letters()->mixedCase()->symbols()],
            'password_confirmation' => 'required|same:password',
        ]);        
        $data['password'] = Hash::make($this->password);
        // \App\Models\User::create([
        //     'first_name' => 'SE', 
        //     'last_name' => 'Admin', 
        //     'email' => $this->email,
        //     'password' => $this->password
        // ]);
        
        try {
            \App\Models\User::create($data);
            if (Auth::attempt(array('email' => $this->email, 'password' => $this->password))) {
                session()->flash('message', "You are Login successful.");
                $this->redirect(route('admin.dashboard'), navigate: true);
            } else {
                session()->flash('error', 'email and password are wrong.');
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            session()->flash('error', 'An error occured why processing your request. Kindly try again later.');
        }
    }
    public function toggleMode(){
        $this->resetValidation();
        $this->loginMode = !$this->loginMode;        
        $this->dispatch('updateUrl', ['account' => $this->loginMode ? 'signin' : 'signup']);

    }
}
