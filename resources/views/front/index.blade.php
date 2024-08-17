<div>
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('front/img/carousel-1.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-4" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h3>
                        <h3 class="display-6 text-white mb-md-4">We are Tour Company dealing mostly with Inbound Tourists from majorly USA, FRANCE .
                            Would like to attract clients from all over the world</h6>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('front/img/carousel-2.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase mb-md-3">Tours & Travel</h4>
                        <h3 class="display-6 text-white mb-md-4">We are a Tour Company dealing mostly with Inbound Tourists from majorly USA, FRANCE .
                            Would like to attract clients from all over the world.
                            </h3>
                            
                        <a href="" class=" border-radius btn btn-primary py-md-3 px-md-5 mt-2 ">Book Now <span wire:loading class="spinner-border spinner-border-sm"></span></a>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-dark" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
    </div>
</div>
<!-- Carousel End -->

@include('front.components.booking')
@include('front.components.about')
@include('front.components.feature')
@include('front.components.services')
@include('front.components.destination')

@include('front.components.packages')
{{--@include('front.components.registration')
@include('front.components.blog')--}}
</div>
