<?php

namespace App\Http\Controllers;

use Livewire\Component;

class BookingController extends Component
{

    public function render()
    {
        return view('front.booking')->layout('front.layouts.app');
    }
}
