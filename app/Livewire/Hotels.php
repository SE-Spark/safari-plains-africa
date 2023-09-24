<?php

namespace App\Livewire;

use Livewire\Component;

class Hotels extends Component
{
    public function render()
    {
        return view('livewire.hotels')->layout('layouts.admin');
    }
}
