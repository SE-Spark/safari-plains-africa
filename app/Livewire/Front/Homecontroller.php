<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Homecontroller extends Component
{
    public function render()
    {
        return view('front.index')->layout('front.layout.app');
    }
}
