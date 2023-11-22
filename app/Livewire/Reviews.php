<?php

namespace App\Livewire;

use Livewire\Component;

class Reviews extends Component
{
    public function render()
    {
        return view('admin.reviews.index')->layout('layouts.admin');
    }
}
