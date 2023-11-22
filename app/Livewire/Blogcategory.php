<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BlogcategoryRepository;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Blogcategory extends Component
{
    public $moduleTitle = 'Categories';
    public $name, $description, $status;
    public $deleteId;
    public $selected_id;
    public $createUpdateMode = false; 

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'status' => 'required',
    ];
    // listen on input 
    protected $listeners = [
        'refresh-category' => '$refresh',
    ];
    // listen on form inputs and validate
    protected $validationAttributes = [
        'name' => 'name',
        'description' => 'description',
        'status' => 'status',
    ];
    // listen on form inputs on keyup to validate
    public function validating()
    {
        $this->validate();
    }

    public function back(){       
        $this->cancel(); 
        $this->moduleTitle = 'Categories';
        $this->createUpdateMode = false;
    }
    public function backAndRefresh(){       
        $this->dispatch('pg:eventRefresh-default');
        $this->cancel(); 
        $this->moduleTitle = 'Categories';
        $this->createUpdateMode = false;
    }
    public function backWithNew(){    
           
        $this->dispatch('pg:eventRefresh-default');
        $this->cancel(); 
        $this->moduleTitle = 'Categories';
        $this->createUpdateMode = false;
    }
    public function createForm(){
        $this->moduleTitle = 'Create Category';
        $this->createUpdateMode = true;
    }
    #[On('editCategory')]
    public function edit(BlogcategoryRepository $categoryService,$rowId)
    {
        $this->moduleTitle = 'Edit Category';
        $this->selected_id = $rowId;
        $category = $categoryService->getAll()->where('id', $rowId)->first();
        $this->name = $category->name;
        $this->description = $category->description;
        $this->status = $category->status;
        $this->createUpdateMode = true;
    }

    public function update(BlogcategoryRepository $categoryService)
    {
        $updatedData = $this->validate();
        try {
            $categoryService->update($this->selected_id, $updatedData);
            $this->selected_id = null;
            $this->backAndRefresh();
            HP::setUnitUpdatedSuccessFlash();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitUpdatedErrorFlash();
        }
    }

    public function save(BlogcategoryRepository $categoryService)
    {
        $validatedData = $this->validate();
        try {
            $this->create($categoryService,$validatedData);
            $this->backWithNew();            
            HP::setUnitAddedSuccessFlash();
            $this->createUpdateMode = false;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    public function savecreate(BlogcategoryRepository $categoryService)
    {
        $validatedData = $this->validate();
        try {
            $this->create($categoryService,$validatedData);
            $this->cancel();
            HP::setUnitAddedSuccessFlash();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
    protected function create($service,$data){
        $service->create($data);
    }
    #[On('deleteCategory')]
    public function deleteDestination(BlogcategoryRepository $categoryService, $rowId)
    {
        if ($categoryService->get()->where('id', $rowId)->first()) {
            $this->deleteId = $rowId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function delete(BlogcategoryRepository $categoryService)
    {
        try {
            $categoryService->delete($this->deleteId);
            HP::setUnitDeletedSuccessFlash();
            $this->dispatch('pg:eventRefresh-default');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            HP::setUnitDeletedErrorFlash();
        }
    }
    public function cancel()
    {
        $this->resetExcept(['createUpdateMode','moduleTitle','category']);
    }
    public function render()
    {
        return view('admin.category.index');
    }
}
