<?php

namespace App\Livewire;
use App\Helpers\HP;
use App\Repository\BookingItemsTypeRepository;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class BookingItemsType extends Component
{
    public $modalTitle = 'Create Item Type';
    public $name, $description, $status;
    public $selectedId, $deleteId;
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];
    public function render()
    {
        return view('admin.itemstype.index');
    }
    
    #[On('editPackage')]
    public function editDestination(BookingItemsTypeRepository $itemTypeService, $rowId)
    {
        $this->modalTitle = 'Edit Item Type';
        $this->selectedId = $rowId;
        $itemType = $itemTypeService->get()->where('id', $rowId)->first();
        $this->name = $itemType->name;
        $this->description = $itemType->description;
        $this->status = $itemType->status;
        $this->js("$('#createUpdateModal').modal('show')");
    }

    public function createUpdate(BookingItemsTypeRepository $itemTypeService)
    {
        $data = $this->validate();

        try {
            if (!empty($this->selectedId)) {
                $itemTypeService->update($this->selectedId, $data);
                HP::setUnitUpdatedSuccessFlash();
            } else {
                $itemTypeService->create($data);
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
    public function delete(BookingItemsTypeRepository $itemTypeService)
    {
        $itemTypeService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deletePackage')]
    public function deleteDestination(BookingItemsTypeRepository $itemTypeService, $rowId)
    {
        if ($itemTypeService->get()->where('id', $rowId)->first()) {
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
