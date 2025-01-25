<?php

namespace App\Livewire\Front;

use App\Helpers\HP;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Aboutcontroller extends Component
{
    
    public function render()
    {
        return view('front.about')->layout('front.layout.app');
    }

}
