<?php

namespace App\Livewire\Front;

use App\Helpers\HP;
use App\Repository\{EnquiryRepository,DestinationsRepository, CountriesRepository};
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Contactcontroller extends Component
{
    private $enquiryRepository;
    public $dest_options,$country_options;
    public $name, $email, $subject, $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function mount(EnquiryRepository $enquiryRepository,DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->enquiryRepository = $enquiryRepository;
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
    }
    public function render()
    {
        return view('front.contact')->layout('front.layout.app');
    }

    public function saveEnquery(EnquiryRepository $enquiryRepository)
    {
        $data = $this->validate();
        try {
            $enquiryRepository->create($data);
            $this->resetExcept('enquiryRepository');
            HP::setUnitAddedSuccessFlash();
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            HP::setUnitAddedErrorFlash();
        }
    }
}
