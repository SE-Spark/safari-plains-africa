<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Destinationcontroller extends Component
{
    public function render()
    {
        return view('front.destinations')->layout('front.layout.app');
    }
}
