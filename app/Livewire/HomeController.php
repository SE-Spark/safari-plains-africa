<?php

namespace App\Livewire;

use Livewire\Component;

class HomeController extends Component
{

    public function render()
    {
        return view('front.index')->layout('front.layouts.app');
    }
}
