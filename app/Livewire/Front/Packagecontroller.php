<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\DestinationsRepository;
use App\Repository\{PackagesRepository, CountriesRepository};
class Packagecontroller extends Component
{
    public $packages,$package;       
    public $dest_options,$country_options;
    public $showMore = false;
    public $isBooking = false;

    public function mount(PackagesRepository $packagesRepository,DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->packages = $packagesRepository->getAll()->where('status',1);
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
        if(request()->route('id')){
            $this->showMoreDetails(request()->route('id'));
        }
    }

    public function render()
    {
        return view('front.packages')->layout('front.layout.app');
    }
    
    public function showMoreDetails($id)
    {
        $this->package = $this->packages->where('id',$id)->first();
        $this->showMore = true;
    }
    
    public function bookNow($id)
    {
        $this->package = $this->packages->where('id',$id)->first();
        $this->isBooking = true;
    }
    public function Back()
    {
        $this->showMore = false;
        $this->reset('package');
    }
}
