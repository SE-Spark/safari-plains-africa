<div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{asset('front/img/about.jpg')}}" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h2 class="mb-4">Welcome to <span class="text-primary">Bonanza Adventures</span></h2>
                    <p class="mb-4">Your gateway to unforgettable experience in East Africa! We are a premier tour and travel company headquartered in Nairobi, Kenya. Our expert team is dedicated to curating exceptional journeys that showcase the rich cultural heritage, breathtaking landscapes, and incredible wildlife that Africa has to offer. Join us for meticulously crafted safaris that blend adventure, authenticity, and comfort, ensuring memories that last a lifetime. Explore East Africa with Bonanza Adventures and embark on a journey like no other.</p>
                    <p class="mb-4">Choose Bonanza Adventures for a holistic and enriching travel experience that combines adventure, cultural immersion, and relaxation, all while exploring the beauty of Kenya's landscapes and wildlife.</p>
                    {{--<div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>--}}
                </div>
            </div>
        </div>
    </div>

    
    @include('front.components.services')
    
    {{--@include('front.components.destinations')--}}
    
    @include('front.components.packages')    
    
    @include('front.components.process')

    @include('front.components.booking')


    {{-- Team Start 
    @include('front.components.team')--}}

</div>