<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Repository\{DestinationsRepository, CountriesRepository};

class Destinationcontroller extends Component
{
    public $destinations, $destination, $countries, $countryId;       
    public $dest_options,$country_options;
    public $showMore = false;

    public function updatedCountryId()
    {
        if ($this->countryId != null) {
            $destinationService = app(DestinationsRepository::class);
            $destinations = $destinationService->getItems(where: ['status' => 1]);
            $this->destinations = $destinations->where('country_id', $this->countryId);
        }
    }
    public function mount(DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->countries = $countriesRepository->getItems(['name', 'id'], ['status' => 1]);
        $this->destinations = $destinationService->getAll()->where('status', 1);        
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
        if (request()->route('id')) {
            $this->showMoreDetails(request()->route('id'));
        }
        $this->dispatch('scrollToDestination');
    }
    public function render()
    {
        return view('front.destinations')->layout('front.layout.app');
    }

    public function getCountryName()
    {
        $country = collect($this->countries)->firstWhere('id', $this->countryId);

        return $country ? $country['name'] : null;
    }
    public function showMoreDetails($id)
    {
        $this->destination = $this->destinations->where('id', $id)->first();
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
