<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Helpers\HP;
use App\Repository\DestinationsRepository;
use Illuminate\Support\Facades\Log;
use App\Repository\{PackagesRepository, CountriesRepository, EnquiryRepository};
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;

class Packagecontroller extends Component
{
    public $packages,$package;       
    public $dest_options,$country_options;    
    public $name, $email, $subject, $message;
    public $showMore = false;
    public $isBooking = false;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'subject' => 'required',
        'message' => 'required',
    ];
    public function mount(PackagesRepository $packagesRepository,DestinationsRepository $destinationService, CountriesRepository $countriesRepository)
    {
        $this->packages = $packagesRepository->getAll()->where('status',1);
        $this->dest_options = $destinationService->get()->where('status',1)->get(['id','name']);
        $this->country_options = $countriesRepository->get()->where('status',1)->get(['id','name']);
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
    public function saveEnquery(EnquiryRepository $enquiryRepository)
    {
        $data = $this->validate();
        try {
            $enquiryRepository->create($data);
            $this->resetExcept(['packages','package','dest_options','country_options','showMore']);
            
            $subject = $data['subject'];
            $to = env('MAIL_PRIMARY');
            $cc = $data['email'];
            $package_name = $this->package->name;
            $title = "Enquiries - $package_name";
            $dt = [
                'msg' => $data['message'],
                'header' => $title,
                'title' => $title
            ];
            Mail::send('emails.notify', $dt, function (Message $message) use ($to, $subject, $cc) {
                $message->to($to);
                $message->subject($subject);
                $message->cc($cc);
            });
            HP::setUnitAddedSuccessFlash('message sent successfully');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            HP::setUnitAddedErrorFlash();
        }
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
