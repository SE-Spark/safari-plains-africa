<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BlogcategoryRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Blogcategory extends Component
{
    public $name, $description, $status;
    public $category;
    public $selected_id;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];

    public function mount(BlogcategoryRepository $categoryService)
    {
        $this->category = $categoryService->getAll();
    }
    public function editDestination($destinationId)
    {
        $this->selected_id = $destinationId;
        $selectedDestination = $this->category->where('id', $destinationId)->first();
        $this->name = $selectedDestination->name;
        $this->description = $selectedDestination->description;
        $this->status = $selectedDestination->status;
        $this->dispatch('editCategory');
    }

    public function update(BlogcategoryRepository $categoryService)
    {
        $updatedData = $this->validate();
        try {
            $categoryService->update($this->selected_id, $updatedData);
            $this->selected_id = null;
            $this->cancel();
            $this->category = $categoryService->getAll();
            HP::setUnitUpdatedSuccessFlash();
            $this->dispatch('categoryStored');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitUpdatedErrorFlash();
        }
    }

    public function create(BlogcategoryRepository $categoryService)
    {
        $this->validate();
        $newDestination = [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
        ];
        try {
            $categoryService->create($newDestination);
            $this->category = $categoryService->getAll();
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
            $this->dispatch('categoryStored');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }

    public function delete(BlogcategoryRepository $categoryService, $destinationId)
    {
        try {
            $categoryService->delete($destinationId);
            $this->category = $categoryService->getAll();
            HP::setUnitDeletedSuccessFlash();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitDeletedErrorFlash();
        }
    }
    public function cancel()
    {
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->status = '';
    }
    public function render()
    {
        return view('admin.category.index')->layout('layouts.admin');
    }
}
