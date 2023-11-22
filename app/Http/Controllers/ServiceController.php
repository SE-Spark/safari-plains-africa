<?php

namespace App\Http\Controllers;

use Livewire\Component;

class ServiceController extends Component
{

    public function render()
    {
        return view('front.service')->layout('front.layouts.app');
    }
}
