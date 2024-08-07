<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Contactcontroller extends Component
{
    public function render()
    {
        return view('front.contact')->layout('front.layout.app');
    }
}
