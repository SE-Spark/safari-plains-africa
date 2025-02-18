<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Helpers\HP;
use App\Repository\{PackagesRepository, EnquiryRepository};
use Illuminate\Support\Facades\Mail;

class IternaryController extends Component
{
    public $package;
    // BOOK FORM FIELDS
    public $currentStep = 2;
    public $travelCompanions;
    public $adults = 0;
    public $teenagers = 0;
    public $children = 0;
    public $email;
    public $firstName;
    public $country;
    public $phone;
    public $contactMethod;
    // END OF BOOK FORM FIELDS

    public function mount(PackagesRepository $packagesRepository)
    {
        $countryName = request()->query('country');
        $destinationName = request()->query('destination');
        $this->packages = $packagesRepository->getFilteredPackages($countryName,$destinationName);
        
        if(request()->route('id')){
            $this->showMoreDetails(request()->route('id'));
        }
    }
    public function showMoreDetails($id)
    {
        $package_id = HP::extractIdFromSlug($id);
        $this->package = $this->packages->where('id',$package_id)->first();
    }
    public function render()
    {
        return view('front.iternary')->layout('front.layout.app');
    }
    
    
    public function setStep($step)
    {
        $this->currentStep = $step;
    }
   
    // public function setTravelCompanions($type)
    // {
    //     $this->travelCompanions = $type;
    // }

    // public function incrementAdults()
    // {
    //     $this->adults++;
    // }

    // public function decrementAdults()
    // {
    //     if ($this->adults > 0) {
    //         $this->adults--;
    //     }
    // }

    // public function incrementTeenagers()
    // {
    //     $this->teenagers++;
    // }

    // public function decrementTeenagers()
    // {
    //     if ($this->teenagers > 0) {
    //         $this->teenagers--;
    //     }
    // }

    // public function incrementChildren()
    // {
    //     $this->children++;
    // }

    // public function decrementChildren()
    // {
    //     if ($this->children > 0) {
    //         $this->children--;
    //     }
    // }
    public function submit()
    {
        // $this->validate();
        // Handle form submission logic here
        // Access the input values directly without validation
        $travelCompanions = $this->travelCompanions;
        $adults = $this->adults;
        $teenagers = $this->teenagers;
        $children = $this->children;
        $email = $this->email;
        $firstName = $this->firstName;
        $country = $this->country;
        $phone = $this->phone;
        $contactMethod = $this->contactMethod;

        // Handle the input values as needed
        // For example, you could save them to the database or send an email
        $data = [
            'travelCompanions' => $travelCompanions,
            'adults' => $adults,
            'teenagers' => $teenagers,
            'children' => $children,
            'country' => $country,
            'email' => $email,
            'firstName' => $firstName,
            'phone' => $phone,
            'contactMethod' => $contactMethod,
        ];
        // Example: Log the values
        \Log::info('Submitted data:', [
            'travelCompanions' => $travelCompanions,
            'adults' => $adults,
            'teenagers' => $teenagers,
            'children' => $children,
            'email' => $email,
            'firstName' => $firstName,
            'contactMethod' => $contactMethod,
        ]);

        // Map the short answers to full-text answers
        $questionsAndAnswers = [
            [
                'question' => "Who are you travelling with?",
                'answer' => match ($data['travelCompanions']) {
                    'couple' => 'COUPLE',
                    'solo' => 'SOLO',
                    'family' => 'FAMILY',
                    'friends' => 'FRIENDS',
                    default => 'N/A'
                }
            ],
            [
                'question' => "How many travelers?",
                'answer' => "Adults: {$data['adults']}, Teenagers: {$data['teenagers']}, Children: {$data['children']}"
            ],
            [
                'question' => "Your details",
                'answer' => "Email: {$data['email']}, First Name: {$data['firstName']}, Country: {$data['country']}, Phone: {$data['phone']}, Preferred Contact Method: {$data['contactMethod']}"
            ]
        ];
        $emailContent = "Travel Enquiry Details:<br/>";
        foreach ($questionsAndAnswers as $question => $item) {
            $emailContent .= $item['question'] . ": " . $item['answer'] . "<br/>";
        }
        Mail::raw($emailContent, function ($message) {
            $message->to(env('MAIL_PRIMARY'))
                ->subject('Travel Enquiry');
        });
    }
}
