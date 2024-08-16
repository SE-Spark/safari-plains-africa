<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
class Packagecontroller extends Component
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
