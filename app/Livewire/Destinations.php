<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;

class Destinations extends Component
{
    use WithFileUploads;
    public $name, $address, $description, $image_url, $image_photo, $status;
    public $deleteId;
    public $selectedDestination_id;

    protected $rules = [
        'name' => 'required',
        'address' => 'required',
        'description' => 'required',
        'image_photo' => 'required_without:selectedDestination_id',
        'status' => 'required',
    ];
    protected $messages = [
        'image_photo.required_without' => 'The image field is required.',
    ];

    public function mount()
    {
    }
    #[On('editDestination')]
    public function editDestination(DestinationsRepository $destinationService, $destinationId)
    {
        $this->selectedDestination_id = $destinationId;
        $selectedDestination = $destinationService->get()->where('id', $destinationId)->first();
        $this->name = $selectedDestination->name;
        $this->address = $selectedDestination->address;
        $this->description = $selectedDestination->description;
        $this->image_url = $selectedDestination->image_url;
        $this->status = $selectedDestination->status;
        $this->dispatch('editDestinations');
    }

    public function update(DestinationsRepository $destinationService)
    {
        // $this->resetValidation('image_photo');
        $updatedData = $this->validate();
        if (!empty($this->image_photo)) {
            $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
            $filePath = public_path('assets/images');
            $fullPath = $filePath . '/' . $filename;
            if (!File::exists($filePath)) {
                File::makeDirectory($filePath, 0755, true); // Recursive directory creation
            }
            File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
            $updatedData['image_url'] = $filename;
        }
        $destinationService->update($this->selectedDestination_id, $updatedData);
        $this->cancel();
        HP::setUnitUpdatedSuccessFlash();
        $this->js("$('#destUpdateModal').modal('hide');");
        $this->dispatch('pg:eventRefresh-default');
    }

    public function create(DestinationsRepository $destinationService)
    {
        $newDestination = $this->validate();
        $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
        $filePath = public_path('assets/images');
        $fullPath = $filePath . '/' . $filename;
        if (!File::exists($filePath)) {
            File::makeDirectory($filePath, 0755, true); // Recursive directory creation
        }
        File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
        $newDestination['image_url'] = $filename;
        try {
            $destinationService->create($newDestination);
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->js("$('#destinationModal').modal('hide');");
            $this->dispatch('pg:eventRefresh-default');
            // $this->dispatch('destinationStored')->to(Destinations::class);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }

    public function delete(DestinationsRepository $destinationService)
    {
        $destinationService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteDestination')]
    public function deleteDestination(DestinationsRepository $destinationService, $destinationId)
    {
        if ($destinationService->get()->where('id', $destinationId)->first()) {
            $this->deleteId = $destinationId;
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
        return view('admin.destinations.index');
    }
}
