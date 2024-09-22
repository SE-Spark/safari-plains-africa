<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Helpers\HP;
use App\Repository\{DestinationsRepository, CountriesRepository};

class Destinationcontroller extends Component
{
    public $destinations, $destination;    
    public $showMore = false;

    public function mount(DestinationsRepository $destinationService)
    {
        $this->destinations = $destinationService->getAll()->where('status', 1);        
        if (request()->route('id')) {
            $this->showMoreDetails(request()->route('id'));
        }
        $this->dispatch('scrollToDestination');
    }
    public function render()
    {
        return view('front.destinations')->layout('front.layout.app');
    }

    
    public function showMoreDetails($id)
    {
        $destination_id = HP::extractIdFromSlug($id);
        $this->destination = $this->destinations->where('id', $destination_id)->first();
        $this->showMore = true;
    }
    public function Back()
    {
        $this->showMore = false;
        $this->reset('destination');
    }
    public function ResetFilter(DestinationsRepository $destinationService)
    {
        $this->countryId = null;
        $this->destinations = $destinationService->getItems(where: ['status' => 1]);
    }

}
