<?php

namespace App\Livewire;

use Livewire\Component;
use App\Repository\{DestinationsRepository, CountriesRepository};
use Livewire\Attributes\On;

class HomeFilterCard extends Component
{

    public $dest_options, $country_options, $country, $destination;


    public function mount(DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->country = request()->query('country');
        $this->destination = request()->query('destination');
        $this->country_options = $countriesRepository->get()->where('status', 1)->get(['id', 'name']);
        $this->dest_options = $destinationService->getFilteredDestinations($this->country);
    }
    public function render()
    {
        return view('livewire.home-filter-card');
    }
    #[On('updatedPropertySelection')]
    public function updatedPropertySelection(DestinationsRepository $destinationService)
    {
        if ($this->country != null) {
            $this->destination = '';
            $this->dest_options = $destinationService->getFilteredDestinations($this->country);
        }
    }
    public function filterSearch()
    {
        $country = $this->country;
        $destination = $this->destination;

        $this->redirect(route('packages', ['country'=>$country, 'destination'=>$destination]), navigate: true);
        
    }
}
