<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BlogcategoryRepository;
use App\Repository\BlogpostRepository;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\Component;

class Blogpost extends Component
{
    // use WithFileUploads;
    // public $title, $image_url, $image_photo, $content, $is_published, $blogcategory_id;

    // public $posts;
    // public $categories;
    // public $selected_id;
    public $deleteId;

    // protected $rules = [
    //     'title' => 'required',
    //     'image_photo' => 'required_without:selected_id',
    //     'content' => 'required',
    //     'is_published' => 'required',
    //     'blogcategory_id' => 'required',
    // ];
    // protected $messages = [
    //     'image_photo.required_without' => 'The image photo field is required.',
    // ];
    public function mount(BlogcategoryRepository $categoryService)
    {
        // $this->categories = $categoryService->getAll();
    }

    public function render()
    {

        return view('admin.posts.index');
    }

    // #[On('editPost')]
    // public function editPost(BlogpostRepository $destinationService, $destinationId)
    // {
    //     $this->selected_id = $destinationId;
    //     $selectedDestination = $destinationService->get()->where('id', $destinationId)->first();
    //     $this->title = $selectedDestination->title;
    //     $this->image_url = $selectedDestination->image_url;
    //     $this->content = $selectedDestination->content;
    //     $this->blogcategory_id = $selectedDestination->blogcategory_id;
    //     $this->is_published = $selectedDestination->is_published;
    //     $this->js("$('#updateModal').modal('show');");
    // }

    // public function update(BlogpostRepository $destinationService)
    // {
    //     $updatedData = $this->validate();
    //     if (!empty($this->image_photo)) {
    //         $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
    //         $filePath = public_path('assets/images');
    //         $fullPath = $filePath . '/' . $filename;
    //         if (!File::exists($filePath)) {
    //             File::makeDirectory($filePath, 0755, true); // Recursive directory creation
    //         }
    //         File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
    //         $updatedData['image_url'] = $filename;
    //     }
    //     $destinationService->update($this->selected_id, $updatedData);
    //     $this->cancel();
    //     HP::setUnitUpdatedSuccessFlash();
    //     $this->js("$('#updateModal').modal('hide');");
    //     $this->dispatch('pg:eventRefresh-default');
    // }
    // public function createPost()
    // {
    //     $this->js("$('#postCreateModal').modal('show');");
    // }
    // public function create(BlogpostRepository $destinationService)
    // {
    //     $data = $this->validate();
    //     $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
    //     $filePath = public_path('assets/images');
    //     $fullPath = $filePath . '/' . $filename;
    //     if (!File::exists($filePath)) {
    //         File::makeDirectory($filePath, 0755, true); // Recursive directory creation
    //     }
    //     File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
    //     $data['image_url'] = $filename;
    //     $destinationService->create($data);
    //     $this->resetExcept('categories');
    //     Hp::setUnitAddedSuccessFlash();
    //     $this->js("$('#postCreateModal').modal('hide');");
    //     $this->dispatch('pg:eventRefresh-default');
    // }

    public function delete(BlogpostRepository $destinationService)
    {
        $destinationService->delete($this->deleteId);
        HP::setUnitDeletedSuccessFlash();
        $this->dispatch('pg:eventRefresh-default');
    }
    #[On('deleteId')]
    public function deleteId(BlogpostRepository $destinationService, $destinationId)
    {
        if ($destinationService->get()->where('id', $destinationId)->first()) {
            $this->deleteId = $destinationId;
            $this->js("$('#deleteModal').modal('show');");
        }
    }
    public function cancel()
    {
        $this->resetExcept('categories');
        $this->resetValidation();
    }
}
