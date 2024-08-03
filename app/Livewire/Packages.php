<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Packages extends Component
{
    public $deleteId, $selectedId;
    public function mount(){
        
    }
    public function render()
    {
        return view('admin.packages.index');
    }

    public function delete(PackagesRepository $packageService)
    {
        $packageService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deletePackage')]
    public function deleteDestination(PackagesRepository $packageService, $rowId)
    {
        if ($packageService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->resetExcept('destinations');
        $this->resetValidation();
    }
}
