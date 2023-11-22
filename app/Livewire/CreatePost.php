<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\BlogcategoryRepository;
use App\Repository\BlogpostRepository;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\Component;

class CreatePost extends Component
{
    use WithFileUploads;
    public $modalTitle = "Create Post";
    public $title, $image_url, $image_photo, $content, $is_published, $blogcategory_id;

    public $posts;
    public $categories;
    public $selectedId;
    public $deleteId;

    protected $rules = [
        'title' => 'required',
        'image_photo' => 'required_without:selectedId',
        'content' => 'required',
        'is_published' => 'required',
        'blogcategory_id' => 'required',
    ];
    protected $messages = [
        'image_photo.required_without' => 'The image photo field is required.',
    ];
    public function mount(BlogcategoryRepository $categoryService, BlogpostRepository $destinationService, $selection = null)
    {
        $this->categories = $categoryService->getAll();
        if ($selection) {
            $this->modalTitle = "Edit Post";
            $this->selectedId = $selection;
            $selectedDestination = $destinationService->get()->where('id', $selection)->first();
            $this->title = $selectedDestination->title;
            $this->image_url = $selectedDestination->image_url;
            $this->content = $selectedDestination->content;
            $this->blogcategory_id = $selectedDestination->blogcategory_id;
            $this->is_published = $selectedDestination->is_published;
        }
    }

    public function render()
    {

        return view('admin.posts.createEdit');
    }

    public function create(BlogpostRepository $destinationService)
    {
        $data = $this->validate();
        if (!empty($this->image_photo)) {
            $filename = uniqid() . '' . time() . '.' . $this->image_photo->extension();
            $filePath = public_path('assets/images');
            $fullPath = $filePath . '/' . $filename;
            if (!File::exists($filePath)) {
                File::makeDirectory($filePath, 0755, true); // Recursive directory creation
            }
            File::put($fullPath, file_get_contents($this->image_photo->getRealPath()));
            $data['image_url'] = $filename;
        }
        if (!empty($this->selectedId)) {
            $destinationService->update($this->selectedId, $data);
            HP::setUnitUpdatedSuccessFlash();
            $this->cancel();
        } else {
            $destinationService->create($data);
            Hp::setUnitAddedSuccessFlash();
        }
        $this->resetExcept('categories');
    }
    public function cancel()
    {
        $this->resetExcept('categories');
        $this->redirect('/posts');
    }
}
