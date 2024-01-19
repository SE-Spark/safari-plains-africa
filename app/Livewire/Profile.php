<?php

namespace App\Livewire;

use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\Component;

class Profile extends Component
{
    use WithFileUploads;
    public $first_name, $last_name, $phone, $email, $full_name, $role, $photoTemp, $photo, $current_password, $password, $password_confirmation;
    public $selectedTab = 'overview';
    
    public function mount()
    {
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->phone = auth()->user()->phone;
        $this->email = auth()->user()->email;
        $this->full_name = $this->first_name . ' ' . $this->last_name;
        $this->role = auth()->user()->is_staff ? 'Staff' : 'User';
    }

    public function render()
    {
        return view('livewire.profile');
    }
    public function saveDetails()
    {
        $data = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);
        Auth::user()->update($data);
        session()->flash('success', 'Details Updated successfully!');
        // $userService->update(auth()->user()->id,$data);
    }
    public function updatePasswords()
    {
        $this->validate([
            'current_password' => 'required',
            'password' => ['required', Password::min(6)->letters()->mixedCase()->symbols()],
            'password_confirmation' => 'required|same:password',
        ]);
        
        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('currentPassword', 'The current password is incorrect.');
            return;
        }
        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);
        session()->flash('success', 'Password changed successfully!');
        $this->reset(['current_password','password','password_confirmation']);
    }
    public function selectTab($tab='overview'){
        $this->selectedTab = $tab;
    }
}
