<?php

namespace App\Livewire\Front;

use Livewire\Component;
use App\Helpers\HP;
use App\Repository\{PackagesRepository, EnquiryRepository};

class IternaryTestController extends Component
{
    public $package;

    public $itinerary = [
        [
            'days' => 'Days 1–2',
            'location' => 'Overnight in Nairobi',
            'description' => 'Upon arrival at Jomo Kenyatta International Airport, enjoy a seamless transfer to Palacina Residential Hotel...',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Nairobi',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Palacina The Residence & The Suites',
            'stay_description' => 'Centrally located in the leafy State House area of Nairobi...',
        ],
        [
            'days' => 'Days 3–4',
            'location' => 'Maasai Mara National Reserve',
            'description' => 'Experience the breathtaking landscapes and wildlife of the Maasai Mara...',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Maasai Mara',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Mara Serena Safari Lodge',
            'stay_description' => 'Set on a hilltop with stunning views of the Mara River...',
        ],
        [
            'days' => 'Days 5–6',
            'location' => 'Lake Nakuru National Park',
            'description' => 'Famous for its flamingos and diverse wildlife, enjoy game drives and bird watching.',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Lake Nakuru',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Lake Nakuru Lodge',
            'stay_description' => 'Located within the park, this lodge offers comfortable accommodation...',
        ],
        [
            'days' => 'Days 7–8',
            'location' => 'Amboseli National Park',
            'description' => 'Home to large herds of elephants and stunning views of Mount Kilimanjaro.',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Amboseli',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Amboseli Serena Safari Lodge',
            'stay_description' => 'Set against the backdrop of Mount Kilimanjaro...',
        ],
        [
            'days' => 'Days 9–10',
            'location' => 'Ol Pejeta Conservancy',
            'description' => 'Visit the sanctuary for endangered species and enjoy a night game drive.',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Ol Pejeta',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Ol Pejeta Bush Camp',
            'stay_description' => 'A luxury tented camp that offers an authentic safari experience...',
        ],
        [
            'days' => 'Days 11–12',
            'location' => 'Samburu National Reserve',
            'description' => 'Known for its unique wildlife and stunning landscapes, enjoy game drives...',
            'image' => 'assets/images/66bf16d30c5c41723799251.jpg',
            'stay_location' => 'Samburu',
            'stay_loc_image' => 'assets/images/66c0730a8343c1723888394.jpg',
            'stay_name' => 'Samburu Intrepids Tented Camp',
            'stay_description' => 'Located along the Ewaso Nyiro River...',
        ],
        [
            'days' => 'Day 13',
            'location' => 'Departure',
            'description' => 'Transfer back to Nairobi for your departure flight, concluding your unforgettable safari adventure.',
            'image' => '',
            'stay_location' => '',
            'stay_name' => '',
            'stay_description' => '',
        ],
    ];

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
        return view('front.iternary-old')->layout('front.layout.app');
    }
}
