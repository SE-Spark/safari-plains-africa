<?php

namespace App\Livewire\Front;

use App\Helpers\HP;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Component
{
    public $currentStep = 8;//5;
    public $q1;
    public $destination;
    public $travelTime;
    public $travelDateStart;
    public $travelDateEnd;
    public $travelCompanions;
    public $adults = 0;
    public $teenagers = 0;
    public $children = 0;
    public $tripDetails;
    public $email;
    public $firstName;
    public $country;
    public $phone;
    public $contactMethod, $phone_country;

    // Define validation rules
    protected function rules()
    {
        return [
            'q1' => 'required',
            'destination' => 'required|string',
            'travelTime' => 'required|string',
            'travelDateStart' => 'required|date',
            'travelDateEnd' => 'required|date|after:travelDateStart',
            'travelCompanions' => 'required|string',
            'adults' => 'required|integer|min:0',
            'teenagers' => 'required|integer|min:0',
            'children' => 'required|integer|min:0',
            'tripDetails' => 'nullable|string|max:500',
            'email' => 'required|email',
            'firstName' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'contactMethod' => 'required|string',
        ];
    }

    public function mount()
    {
        // Initialize any necessary data
    }

    public function setStep($step)
    {
        if($step==6 && in_array($this->travelCompanions,['solo','couple']))
        {
            $this->currentStep = 8;
        }
        else if($step== 7){
            $this->currentStep = 8;
        }
        else{
            $this->currentStep = $step;
        }
    }
    public function setBack($step){
        if($step==6 && in_array($this->travelCompanions,['solo','couple']))
        {
            $this->currentStep = 5;
        }
        else if($step==7 && in_array($this->travelCompanions,['solo','couple']))
        {
            $this->currentStep = 5;
        }
        else if($step== 7){
            $this->currentStep = 6;
        }
        else{
            $this->currentStep = $step;
        }
    }
    public function setQ1($q1)
    {
        $this->q1 = $q1;
    }
    public function setDestination($destination)
    {
        $this->destination = $destination;
    }

    public function setTravelTime($time)
    {
        $this->travelTime = $time;
    }

    public function setTravelCompanions($type)
    {
        $this->travelCompanions = $type;
    }

    public function incrementAdults()
    {
        $this->adults++;
    }

    public function decrementAdults()
    {
        if ($this->adults > 0) {
            $this->adults--;
        }
    }

    public function incrementTeenagers()
    {
        $this->teenagers++;
    }

    public function decrementTeenagers()
    {
        if ($this->teenagers > 0) {
            $this->teenagers--;
        }
    }

    public function incrementChildren()
    {
        $this->children++;
    }

    public function decrementChildren()
    {
        if ($this->children > 0) {
            $this->children--;
        }
    }

    public function submit()
    {
        // $this->validate();
        // Handle form submission logic here
        // Access the input values directly without validation
        $travelCompanions=$this->travelCompanions;
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
    public function submit_old()
    {
        // $this->validate();
        // Handle form submission logic here
        // Access the input values directly without validation
        $q1 = $this->q1;
        $destination = $this->destination;
        $travelTime = $this->travelTime;
        $travelDateStart = $this->travelDateStart;
        $travelDateEnd = $this->travelDateEnd;
        $travelCompanions = $this->travelCompanions;
        $adults = $this->adults;
        $teenagers = $this->teenagers;
        $children = $this->children;
        $tripDetails = $this->tripDetails;
        $email = $this->email;
        $firstName = $this->firstName;
        $surname = $this->surname;
        $contactMethod = $this->contactMethod;

        // Handle the input values as needed
        // For example, you could save them to the database or send an email
        $data = [
            'q1' => $q1,
            'destination' => $destination,
            'travelTime' => $travelTime,
            'travelDateStart' => $travelDateStart,
            'travelDateEnd' => $travelDateEnd,
            'travelCompanions' => $travelCompanions,
            'adults' => $adults,
            'teenagers' => $teenagers,
            'children' => $children,
            'tripDetails' => $tripDetails,
            'email' => $email,
            'firstName' => $firstName,
            'surname' => $surname,
            'contactMethod' => $contactMethod,
        ];
        // Example: Log the values
        \Log::info('Submitted data:', [
            'destination' => $destination,
            'travelTime' => $travelTime,
            'travelDateStart' => $travelDateStart,
            'travelDateEnd' => $travelDateEnd,
            'travelCompanions' => $travelCompanions,
            'adults' => $adults,
            'teenagers' => $teenagers,
            'children' => $children,
            'tripDetails' => $tripDetails,
            'email' => $email,
            'firstName' => $firstName,
            'surname' => $surname,
            'contactMethod' => $contactMethod,
        ]);

        // Map the short answers to full-text answers
        $questionsAndAnswers = [
            [
                'question' => "Do you know where you would like to travel?",
                'answer' => $data['q1'] === 'yes' ? 'YES' : 'ANYWHERE IN EAST AFRICA'
            ],
            [
                'question' => "Where would you like to travel?",
                'answer' => $data['destination']
            ],
            [
                'question' => "When would you like to travel?",
                'answer' => match ($data['travelTime']) {
                    'exact' => 'I KNOW EXACTLY WHEN',
                    'rough' => 'I HAVE A ROUGH IDEA',
                    'best' => 'TELL ME WHEN IS BEST',
                    default => 'N/A'
                }
            ],
            [
                'question' => "When would you like to travel (dates)?",
                'answer' => "From {$data['travelDateStart']} to {$data['travelDateEnd']}"
            ],
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
                'question' => "Tell us more about your trip",
                'answer' => $data['tripDetails']
            ],
            [
                'question' => "Your details",
                'answer' => "Email: {$data['email']}, First Name: {$data['firstName']}, Surname: {$data['surname']}, Preferred Contact Method: {$data['contactMethod']}"
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
    public function render()
    {
        return view('front.enquiry')->layout('front.layout.app');
    }
}
