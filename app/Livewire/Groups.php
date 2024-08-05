<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\GroupRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class Groups extends Component
{
    use WithFileUploads;
    public $name, $status;
    public $deleteId;
    public $selectedId;

    protected $rules = [
        'name' => 'required',
        'description' => 'nullable',
        'status' => 'required',
    ];
    protected $messages = [
        'name.required' => 'The Group Name is required.',
    ];

    public function mount()
    {
    }
    #[On('editGroup')]
    public function editCountry(GroupRepository $groupService, $groupId)
    {
        $this->selectedId = $groupId;
        $selectedGroup = $groupService->get()->where('id', $groupId)->first();
        $this->name = $selectedGroup->name;
        $this->status = $selectedGroup->status;        
        $this->js("$('#destUpdateModal').modal('show')");
        // $this->dispatch('editCountries');
    }

    public function update(GroupRepository $groupService)
    {
        $updatedData = $this->validate();
        $groupService->update($this->selectedId, $updatedData);
        $this->cancel();
        HP::setUnitUpdatedSuccessFlash();
        $this->js("$('#destUpdateModal').modal('hide');");
        $this->dispatch('pg:eventRefresh-default');
    }

    public function create(GroupRepository $groupService)
    {
        $newCountry = $this->validate();
        try {
            $groupService->create($newCountry);
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->js("$('#countryModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }

    public function delete(GroupRepository $groupService)
    {
        $groupService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteGroup')]
    public function deleteCountry(GroupRepository $groupService, $groupId)
    {
        if ($groupService->get()->where('id', $groupId)->first()) {
            $this->deleteId = $groupId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }
    public function render()
    {
        return view('admin.groups.index');
    }
}
