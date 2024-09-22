<?php

namespace App\Livewire\Front;

use App\Helpers\HP;
use App\Repository\{EnquiryRepository};
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Contactcontroller extends Component
{
    private $enquiryRepository;
    public $name, $email, $subject, $message;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];

    public function mount(EnquiryRepository $enquiryRepository)
    {
        $this->enquiryRepository = $enquiryRepository;
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
