<?php

namespace App\Livewire;

use Livewire\Component;

class BookingItems extends Component
{
    public function render()
    {
        return view('livewire.booking-items')->layout('layouts.admin');
    }
}
