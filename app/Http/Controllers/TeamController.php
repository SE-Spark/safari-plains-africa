<?php

namespace App\Http\Controllers;

use Livewire\Component;

class TeamController extends Component
{

    public function render()
    {
        return view('front.team')->layout('front.layouts.app');
    }
}
