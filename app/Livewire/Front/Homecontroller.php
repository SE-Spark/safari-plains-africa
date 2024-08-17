<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\DestinationsRepository;
use App\Repository\{PackagesRepository,CountriesRepository};

class Homecontroller extends Component
{
    public $destinations,$packages,$countries;    
    public $dest_options,$country_options;
    public function mount(DestinationsRepository $destinationService,PackagesRepository $packagesRepository,CountriesRepository $countriesRepository)
    {
        $this->destinations = $destinationService->get()->where('status',1)->inRandomOrder()->take(3)->get();
        $this->packages = $packagesRepository->get()->where('status',1)->inRandomOrder()->take(3)->get();
        $this->countries = $countriesRepository->get()->where('status',1)->inRandomOrder()->take(3)->get();
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
    }
    public function render()
    {
        return view('front.index')->layout('front.layout.app');
    }
}
