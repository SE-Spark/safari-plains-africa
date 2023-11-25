<?php

namespace App\Http\Controllers;

use Livewire\Component;

class NotFoundController extends Component
{

    public function render()
    {
        return view('errors.404')->layout('front.layouts.app');
    }
}
