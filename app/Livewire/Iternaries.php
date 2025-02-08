<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Repository\PackagesRepository;

class Iternaries extends Component
{
    public $deleteId, $selectedId;
    public function mount(){
        
    }
    public function render()
    {
        return view('admin.iternary.index');
    }
    
    #[On('deleteIternary')]
    public function deleteDestination(PackagesRepository $packageService, $rowId)
    {
        if ($packageService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
}