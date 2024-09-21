<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repository\TestimonialRepository;

class TestimonialCard extends Component
{
    public $testimonials;
    
    public function mount(TestimonialRepository $testimonialRepository)
    {
        $this->testimonials = $testimonialRepository->get()->where('status',1)->get(['id','name','message','profession']);;
    }
    public function render()
    {
        return view('livewire.testimonial-card');
    }
}
