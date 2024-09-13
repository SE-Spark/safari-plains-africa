<?php

namespace App\Livewire\Front;

use App\Helpers\HP;
use App\Repository\{DestinationsRepository, CountriesRepository};
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Aboutcontroller extends Component
{
    
    public $dest_options,$country_options;
    public function mount(DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
    }
    public function render()
    {
        return view('front.about')->layout('front.layout.app');
    }

}
