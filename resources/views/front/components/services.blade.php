<!-- Service Start -->
@php
$services = [
[
    'title'=>'Standard Safari Packages',
    'content' =>'Immerse yourself in Kenya’s iconic National Parks and Reserves through our expertly designed safari itineraries. Experience the thrill of wildlife encounters and the majesty of nature at its finest.'
],
[
    'title'=>'Getaways',
    'content' =>'Indulge in a refreshing retreat with our quick getaway packages, perfect for a rejuvenating escape from the everyday hustle. These short trips are designed to recharge your spirit.'
],
[
    'title'=>'Tailor-made Packages',
    'content' =>'Craft your perfect adventure with our customizable safari packages, designed to align with your personal preferences and desires. Every detail is shaped around your unique vision.'
],
[
    'title'=>'Solo Traveler Packages',
    'content' =>'Discover the freedom and empowerment of solo travel with our carefully curated experiences, offering a deeply personal connection to Kenya’s landscapes and wildlife.'
],
[
    'title'=>'Honeymoon Packages',
    'content' =>'Celebrate your love story with our romantic honeymoon safaris, where enchanting landscapes and intimate settings create unforgettable memories for newlyweds.'
],
[
    'title'=>'Group & Family Packages',
    'content' =>'Share the wonders of Kenya with your loved ones through our group and family safari packages, designed for memorable adventures that bring everyone closer together.'
],
[
    'title'=>'High-End All-Inclusive Packages',
    'content' =>'Experience the pinnacle of luxury with our all-inclusive safaris, where every aspect of your journey is thoughtfully arranged for a seamless, worry-free experience.'
],
[
    'title'=>'Budget Safaris',
    'content' =>'Enjoy the adventure of a lifetime with our budget-friendly safaris, offering exceptional value without compromising on quality or comfort.'
],
];
@endphp
<div class="container-fluid py-5">
    <div class="container pt-5">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
            <h4>Tours & Travel Services</h4>
        </div>
        <div class="row toprow">
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 mb-4 equal-height">
                <div class="service-item bg-white text-center py-5 px-4"style="height:100%;">
                    <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                    <h5 class="mb-2">{{$service['title']}}</h5>
                    <p class="m-0">{{$service['content']}}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->