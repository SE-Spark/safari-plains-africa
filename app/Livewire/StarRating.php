<?php

namespace App\Livewire;

use Livewire\Component;

class StarRating extends Component
{
    public $rating = 0;
    public function render()
    {
        return view('livewire.star-rating');
    }
}
