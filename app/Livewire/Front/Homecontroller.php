<?php

namespace App\Livewire\Front;

use App\Repository\DestinationsRepository;
use Livewire\Component;

class Homecontroller extends Component
{
    public $destinations;
    public $packages;
    public $blogs;
    public $contacts;
    public function mount(DestinationsRepository  $destinationsRepository){
        $this->destinations = $destinationsRepository->get()->take(10)->get();

    }
    public function render()
    {
        return view('front.index')->layout('front.layout.app');
    }
}