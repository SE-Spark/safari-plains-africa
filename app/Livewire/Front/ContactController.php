<?php

namespace App\Livewire\Front;

use Livewire\Component;

class ContactController extends Component
{

    public function render()
    {
        return view('front.contact')->layout('front.layouts.app');
    }
}
