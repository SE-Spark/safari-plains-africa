<?php

namespace App\Livewire\Front;

use Livewire\Component;

class Blogcontroller extends Component
{
    public function render()
    {
        return view('front.blog')->layout('front.layout.app');
    }
}
