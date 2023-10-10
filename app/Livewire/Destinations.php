<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use Livewire\Component;
use App\Services\DestinationsService;
use Illuminate\Support\Facades\Log;

class Destinations extends Component
{
    public $name, $address, $description, $image_url, $status;
    public $destinations;
    public $selectedDestination_id;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'description' => 'required',
        'image_url' => 'required',
        'status' => 'required',
    ];


    public function mount(DestinationsRepository $destinationService)
    {
        $this->destinations = $destinationService->getAll();
    }
    public function editDestination($destinationId)
    {
        $this->selectedDestination_id = $destinationId;
        $selectedDestination = $this->destinations->where('id', $destinationId)->first();
        $this->name = $selectedDestination->name;
        $this->address = $selectedDestination->address;
        $this->description = $selectedDestination->description;
        $this->image_url = $selectedDestination->image_url;
        $this->status = $selectedDestination->status;
        $this->dispatch('editDestinations');
    }

    public function update(DestinationsRepository $destinationService)
    {
        $updatedData = $this->validate();
        $destinationService->update($this->selectedDestination_id, $updatedData);
        $this->selectedDestination_id = null;
        $this->cancel();
        $this->destinations = $destinationService->getAll();
        session()->flash('success', 'Category edited Successfully!!');
        $this->dispatch('destinationStored');
    }

    public function create(DestinationsRepository $destinationService)
    {
        $this->validate();
        $newDestination = [
            'name' => $this->name,
            'address' => $this->address,
            'description' => $this->description,
            'image_url' => $this->image_url,
            'status' => $this->status,

        ];
        try {
            $destinationService->create($newDestination);
            $this->destinations = $destinationService->getAll();
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->dispatch('destinationStored')->to(Destinations::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }

    public function delete(DestinationsRepository $destinationService, $destinationId)
    {
        $destinationService->delete($destinationId);
        $this->destinations = $destinationService->getAll();
    }
    public function cancel()
    {
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->address = '';
        $this->description = '';
        $this->image_url = '';
        $this->status = '';
    }
    public function placeholder()
    {
        return <<<HTML
        <div>loading ....</div>
        HTML;
    }
    public function render()
    {
        return view('admin.destinations.index');
    }
}
