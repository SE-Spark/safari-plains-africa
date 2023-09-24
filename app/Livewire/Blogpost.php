<?php

namespace App\Livewire;

use Livewire\Component;

class Blogpost extends Component
{
    public function render()
    {
        return view('livewire.blogpost')->layout('layouts.admin');
    }
}
