<?php

namespace App\Livewire;

use App\Repository\BlogpostRepository;
use Livewire\Component;

class Blogpost extends Component
{
    public $title, $image_url, $content, $is_published, $blogcategory_id;
    public $posts;
    public $selected_id;

    protected $rules = [
        'title' => 'required',
        'image_url' => 'required',
        'content' => 'required',
        'is_published' => 'required',
        'blogcategory_id' => 'required',
    ];

    public function mount(BlogpostRepository $destinationService)
    {
        $this->posts = $destinationService->getAll();
    }
    public function editDestination($destinationId)
    {
        $this->selected_id = $destinationId;
        $selectedDestination = $this->posts->where('id', $destinationId)->first();
        $this->title = $selectedDestination->title;
        $this->image_url = $selectedDestination->image_url;
        $this->content = $selectedDestination->content;
        $this->blogcategory_id = $selectedDestination->blogcategory_id;
        $this->is_published = $selectedDestination->is_published;
        $this->dispatch('editDestinations');
    }

    public function update(BlogpostRepository $destinationService)
    {
        $updatedData = $this->validate();     
        $destinationService->update($this->selected_id, $updatedData);
        $this->selected_id = null; 
        $this->cancel();
        $this->posts = $destinationService->getAll();
        session()->flash('success', 'Category edited Successfully!!');
        $this->dispatch('destinationStored');
    }

    public function create(BlogpostRepository $destinationService)
    {
        $this->validate();
        $newDestination = [
            'title' => $this->title,
            'image_url' => $this->image_url,
            'content' => $this->content,
            'blogcategory_id' => $this->blogcategory_id,
            'is_published' => $this->is_published,

        ];
        $destinationService->create($newDestination);
        $this->posts = $destinationService->getAll();
        $this->cancel();
        session()->flash('success', 'Category Created Successfully!!');
        $this->dispatch('destinationStored');
    }

    public function delete(BlogpostRepository $destinationService, $destinationId)
    {
        $destinationService->delete($destinationId);
        $this->posts = $destinationService->getAll();
    }
    public function cancel()
    {
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->title = '';
        $this->image_url = '';
        $this->content = '';
        $this->blogcategory_id = '';
        $this->is_published = '';
    }

    public function render()
    {
        return view('admin.posts.index')->layout('layouts.admin');
    }
}
