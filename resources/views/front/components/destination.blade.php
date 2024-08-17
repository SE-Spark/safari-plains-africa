
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h4>We offer high end All inclusive packages and Budget safaris</h4>
            </div>
            <div class="row">
                @forelse($destinations as $dest)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($dest->image_url)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">{{$dest->name.' in '.$dest->country->name}}</h5>
                            <span>{{$dest->packages->count()??0}} Package(s)</span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col">
                    <p>No destinations found</p>
                </div>
                @endforelse
                {{--
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('front/img/destination-2.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Solo Traveler</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('front/img/destination-3.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Honey moon </h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('front/img/destination-4.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Groups and Family </h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('front/img/destination-5.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Traditions</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{asset('front/img/destination-6.jpg')}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Car Racing</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>
    <!-- Destination Start -->