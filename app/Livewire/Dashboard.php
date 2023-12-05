<?php

namespace App\Livewire;

use App\Repository\BlogpostRepository;
use App\Repository\BookingRepository;
use App\Repository\DestinationsRepository;
use App\Repository\UserRepository;
use Livewire\Component;

class Dashboard extends Component
{
    public $posts,$booking;
    public $bookingCount, $usersCount, $destCount;

    public function mount(BlogpostRepository $blogpostRepository, BookingRepository $bookingRepository,UserRepository $userRepository,DestinationsRepository $destinationsRepository)
    {
        $this->posts = $blogpostRepository->getAll()->where('is_published',1);
        $this->booking = $bookingRepository->getAll();
        $this->bookingCount = $bookingRepository->get()->count();
        $this->usersCount = $userRepository->get()->count();
        $this->destCount = $destinationsRepository->get()->count();
    }
    public function render()
    {
        return view('home')->layout('layouts.admin');
    }
}
