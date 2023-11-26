<?php

namespace App\Http\Controllers;

use App\Repository\DestinationsRepository;
use App\Repository\PackagesRepository;
use Livewire\Component;

class DestinationController extends Component
{
    public $destinations, $destination;
    public $showMore = false;
    public function mount(DestinationsRepository $destinationService)
    {
        $this->destinations = $destinationService->getAll()->where('status', 1);
        if(request()->route('id')){
            $this->showMoreDetails(request()->route('id'));
        }
        $this->dispatch('scrollToDestination');
    }

    public function render()
    {
        return view('front.destination')->layout('front.layouts.app');
    }
    public function showMoreDetails($id)
    {
        $this->destination = $this->destinations->where('id',$id)->first();
        $this->showMore = true;
    }
    public function Back()
    {
        $this->showMore = false;
        $this->reset('destination');
    }
}
