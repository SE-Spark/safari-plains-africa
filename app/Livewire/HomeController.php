<?php

namespace App\Livewire;

use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
use Livewire\Component;

class HomeController extends Component
{
    public $destinations,$packages;
    public function mount(DestinationsRepository $destinationService,PackagesRepository $packagesRepository)
    {
        $this->destinations = $destinationService->get()->where('status',1)->inRandomOrder()->take(3)->get();
        $this->packages = $packagesRepository->get()->where('status',1)->inRandomOrder()->take(3)->get();
    }
    

    public function render()
    {        
        return view('front.index')->layout('front.layouts.app');
    }
}
