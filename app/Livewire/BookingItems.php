<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BookingItemsRepository;
use App\Repository\BookingItemsTypeRepository;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class BookingItems extends Component
{
    use WithFileUploads;
    public $modalTitle = 'Create Item';
    public $booking_item_type_id,$title,$description,$img_url,$image_photo,$booking_date_from,$booking_date_to,$number_of_people,$status;
    public $itemTypes;
    public $deleteId, $selectedId;
    protected $rules = [
        'booking_item_type_id' => 'required',
        'title' => 'required',
        'description' => 'required',
        'image_photo' => 'required_without:selectedId',
        'booking_date_from' => 'required',
        'booking_date_to' => 'required',
        'number_of_people' => 'required',
        'status' => 'required',
    ];
    public function mount(BookingItemsTypeRepository $itemtypeService)
    {
        $this->itemTypes = $itemtypeService->getAll();
    }
    public function render()
    {
        return view('admin.items.index');
    }
    
    #[On('editPackage')]
    public function editDestination(BookingItemsRepository $itemService, $rowId)
    {
        $this->modalTitle = 'Edit Item';
        $this->selectedId = $rowId;
        $itemType = $itemService->get()->where('id', $rowId)->first();
        $this->title = $itemType->title;
        $this->description = $itemType->description;
        $this->img_url = $itemType->img_url;
        $this->booking_date_from = $itemType->booking_date_from;
        $this->booking_date_to = $itemType->booking_date_to;
        $this->number_of_people = $itemType->number_of_people;
        $this->booking_item_type_id = $itemType->booking_item_type_id;
        $this->status = $itemType->status;
        $this->js("$('#createUpdateModal').modal('show')");
    }

    public function createUpdate(BookingItemsRepository $itemService)
    {
        $data = $this->validate();

        try {
            if (!empty($this->image_photo)) {
                $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
                $filePath = public_path('assets/images');
                $fullPath = $filePath . '/' . $filename;
                if (!File::exists($filePath)) {
                    File::makeDirectory($filePath, 0755, true); // Recursive directory creation
                }
                File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
                $data['img_url'] = $filename;
            }
            if (!empty($this->selectedId)) {
                $itemService->update($this->selectedId, $data);
                HP::setUnitUpdatedSuccessFlash();
            } else {
                $itemService->create($data);
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
    public function delete(BookingItemsRepository $itemService)
    {
        $itemService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deletePackage')]
    public function deleteDestination(BookingItemsRepository $itemService, $rowId)
    {
        if ($itemService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    
    public function cancel()
    {
        $this->resetExcept('itemTypes');
        $this->resetValidation();
    }
}
