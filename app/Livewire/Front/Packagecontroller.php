<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Packagecontroller extends Component
{
    public function render()
    {
        return view('front.packages')->layout('front.layout.app');
    }
}
