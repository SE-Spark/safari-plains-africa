<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\DestinationsRepository;
use App\Repository\{PackagesRepository,CountriesRepository};

class Homecontroller extends Component
{
    public $destinations,$packages;  
    public function mount(DestinationsRepository $destinationService,PackagesRepository $packagesRepository,CountriesRepository $countriesRepository)
    {
        $this->destinations = $destinationService->get()->where('status',1)->inRandomOrder()->take(3)->get();
        $this->packages = $packagesRepository->get()->where('status',1)->inRandomOrder()->take(3)->get();
        
    }
    public function render()
    {
        return view('front.index')->layout('front.layout.app');
    }
}
