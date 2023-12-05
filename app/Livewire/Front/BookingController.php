<?php

namespace App\Livewire\Front;

use App\Repository\BookingRepository;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BookingController extends Component
{
    public $bookings;
    public function mount(BookingRepository $bookingRepository){
        $this->bookings = $bookingRepository->get()->where('customer_id',Auth::user()->id)->get();
    }
    public function render()
    {
        return view('front.booking')->layout('front.layouts.app');
    }
}
