<?php

namespace App\Http\Controllers;

use Livewire\Component;

class AboutController extends Component
{

    public function render()
    {
        return view('front.about')->layout('front.layouts.app');
    }
}
