<?php

namespace App\Livewire;

use Livewire\Component;

class Blogcategory extends Component
{
    public $name, $description, $status;
    
    public function render()
    {
        return view('livewire.blogcategory')->layout('layouts.admin');
    }
}
