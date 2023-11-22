<?php

namespace App\Http\Controllers;

use Livewire\Component;

class DestinationController extends Component
{

    public function render()
    {
        return view('front.destination')->layout('front.layouts.app');
    }
}
