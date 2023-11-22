<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Users extends Component
{
    public $modalTitle = 'Create User';
    public $first_name, $last_name, $phone, $email, $is_staff;

    public $deleteId, $selectedId;

    public $rules =[
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'is_staff' => 'required',
    ];

    public function render()
    {
        return view('admin.users.index');
    }

    #[On('editUser')]
    public function editUser(UserRepository $userService, $rowId)
    {
        $this->selectedId = $rowId;
        if(auth()->user()->id === $this->selectedId){
            session()->flush("error","Operation denied. Please click on profile to edit your profile");
            $this->cancel();
            return;
        }
        $this->modalTitle = 'Edit User';
        $hotel = $userService->get()->where('id', $rowId)->first();
        $this->first_name = $hotel->first_name;
        $this->phone = $hotel->phone;
        $this->last_name = $hotel->last_name;
        $this->email = $hotel->email;
        $this->is_staff = $hotel->is_staff;
        $this->js("$('#createUpdateModal').modal('show')");
    }

    public function createUpdate(UserRepository $userService)
    {
        $data = $this->validate();

        try {
            if (!empty($this->selectedId)) {                
                $userService->update($this->selectedId, $data);
                HP::setUnitUpdatedSuccessFlash();
            } else {                
                $data['password'] = Hash::make('123456');
                $userService->create($data);
                HP::setUnitAddedSuccessFlash();
            }
            $this->cancel();
            $this->js("$('#createUpdateModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    public function delete(UserRepository $userService)
    {
        $userService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteUser')]
    public function deleteUser(UserRepository $userService, $rowId)
    {
        if ($userService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }
}
