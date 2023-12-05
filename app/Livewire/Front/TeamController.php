<?php

namespace App\Livewire\Front;

use Livewire\Component;

class TeamController extends Component
{

    public function render()
    {
        return view('front.team')->layout('front.layouts.app');
    }
}
