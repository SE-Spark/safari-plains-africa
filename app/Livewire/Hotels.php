<?php

namespace App\Livewire;
use App\Helpers\HP;
use App\Repository\HotelsRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Hotels extends Component
{
    public $name,$address,$contact_number,$star_rating,$description,$status;
    public $deleteId, $selectedId,$rating=2;
    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'contact_number' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];

    public function render()
    {
        return view('admin.hotels.index');
    }
    
    #[On('editHotel')]
    public function editDestination(HotelsRepository $hotelService, $rowId)
    {
        $this->selectedId = $rowId;
        $hotel = $hotelService->get()->where('id', $rowId)->first();
        $this->name = $hotel->name;
        $this->address = $hotel->address;
        $this->contact_number = $hotel->contact_number;
        $this->description = $hotel->description;
        $this->status = $hotel->status;
        $this->js("$('#updateModal').modal('show')");
    }

    public function update(HotelsRepository $hotelService)
    {
        $updatedData = $this->validate();
        $hotelService->update($this->selectedId, $updatedData);
        $this->cancel();
        HP::setUnitUpdatedSuccessFlash();
        $this->js("$('#updateModal').modal('hide')");
        $this->dispatch('pg:eventRefresh-default');
    }

    public function create(HotelsRepository $hotelService)
    {
        $newDestination = $this->validate();
        
        try {
            $hotelService->create($newDestination);
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->js("$('#createModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
            // $this->dispatch('destinationStored')->to(Destinations::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    public function delete(HotelsRepository $hotelService)
    {
        $hotelService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteHotel')]
    public function deleteDestination(HotelsRepository $hotelService, $rowId)
    {
        if ($hotelService->get()->where('id', $rowId)->first()) {
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
