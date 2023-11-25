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

    public $modalTitle = 'Create Package';
    public $name, $description, $price, $number_of_people, $start_date, $end_date, $status, $destinationId, $destinations;
    public $deleteId, $selectedId;
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required',
        'destinationId' => 'required',
        'number_of_people' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'status' => 'required',
    ];
    public function mount(DestinationsRepository $destinationService){
        $this->destinations = $destinationService->getAll();
    }
    public function render()
    {
        return view('admin.packages.index');
    }

    #[On('editPackage')]
    public function editDestination(PackagesRepository $packageService, $rowId)
    {
        $this->modalTitle = 'Edit Package';
        $this->selectedId = $rowId;
        $hotel = $packageService->get()->where('id', $rowId)->first();
        $this->name = $hotel->name;
        $this->description = $hotel->description;
        $this->price = $hotel->price;
        $this->start_date = $hotel->start_date;
        $this->end_date = $hotel->end_date;
        $this->status = $hotel->status;
        $this->js("$('#createUpdateModal').modal('show')");
    }

    public function createUpdate(PackagesRepository $packageService)
    {
        $data = $this->validate();

        try {
            if (!empty($this->selectedId)) {
                $packageService->updateWithDestinations($this->selectedId, $data,(array) [$this->destinationId]);
                HP::setUnitUpdatedSuccessFlash();
            } else {
                $packageService->createWithDestinations($data,(array) [$this->destinationId]);
                HP::setUnitAddedSuccessFlash();
            }
            $this->cancel();
            $this->js("$('#createUpdateModal').modal('toggle');");
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
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
