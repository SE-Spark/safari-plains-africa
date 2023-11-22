<?php

namespace App\Http\Controllers;

use Livewire\Component;

class TestimonialController extends Component
{

    public function render()
    {
        return view('front.testimonial')->layout('front.layouts.app');
    }
}
