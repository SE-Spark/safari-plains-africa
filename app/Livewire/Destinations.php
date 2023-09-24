<?php

namespace App\Livewire;

use App\Repository\DestinationsRepository;
use Livewire\Component;
use App\Services\DestinationsService;
use Illuminate\Support\Facades\Log;

class Destinations extends Component
{
    public $name,$address,$description,$image_url,$status;
    public $destinations, $selectedDestination;
    public $selectedDestination_id;
    public $newDestination = [];
    public $updateDestination = false;
    protected $rules = [
        'name'=>'required',
        'address'=>'required',
        'description'=>'required',
        'image_url'=>'required',
        'status'=>'required',
    ];

    public function mount(DestinationsRepository $destinationService)
    {
        $this->destinations = $destinationService->getAll();
    }

    public function edit($destinationId)
    {
        $this->selectedDestination_id = $destinationId;
        $this->selectedDestination = $this->destinations->where('id', $destinationId)->first();
    }

    public function update(DestinationsRepository $destinationService)
    {
        $updatedData = $this->validate();
        // Validate and update the selected destination using the service
        $destinationService->update($this->selectedDestination, $updatedData);
        $this->selectedDestination = null; // Clear the selected destination
        $this->destinations = $destinationService->getAll(); 
        session()->flash('success', 'Category Created Successfully!!');
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
        $destinationService->create($newDestination);
        $this->destinations = $destinationService->getAll(); 
        $this->cancel();
        session()->flash('success', 'Category Created Successfully!!');
        $this->dispatch('destinationStored');
    }

    public function delete(DestinationsRepository $destinationService, $destinationId)
    {
        $destinationService->delete($destinationId);
        $this->destinations = $destinationService->getAll(); 
    }
    public function cancel()
    {
        $this->updateDestination = false;
        $this->resetInputFields();
    }
    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->image_url = '';
        $this->status = '';        
    }
    public function render()
    {
        return view('admin.destinations.index')->layout('layouts.admin');
    }
}
