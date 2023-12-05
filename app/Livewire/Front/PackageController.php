<?php

namespace App\Livewire\Front;

use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
use Livewire\Component;

class PackageController extends Component
{
    public $packages,$package;
    public $showMore = false;
    public $isBooking = false;
    public function mount(PackagesRepository $packagesRepository)
    {
        $this->packages = $packagesRepository->getAll()->where('status',1);
        if(request()->route('id')){
            $this->showMoreDetails(request()->route('id'));
        }
    }

    public function render()
    {
        return view('front.package')->layout('front.layouts.app');
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
