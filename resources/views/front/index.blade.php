<div>
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('front/img/main-9.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-4" style="max-width: 900px;">
                        <h1 class="text-white text-uppercase mb-md-3">Safari Plains Africa</h1>
                        <h4 class="display-5 text-white mb-md-4">Specialized in tailor-made Safari Holidays in Kenya, Tanzania, Uganda, Rwanda, and Zanzibar</h4>                       
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('front/img/main-12.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="text-white text-uppercase mb-md-3">Safari Plains Africa</h1>
                        <h4 class="display-5 text-white mb-md-4">An Africa-based, family-run tour company with trusted partners abroad since 2002
                            </h4>                        
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('front/img/main-11.jpg')}}" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h1 class="text-white text-uppercase mb-md-3">Safari Plains Africa</h1>
                        <h4 class="display-5 text-white mb-md-4">With decades of experience, your adventure starts where we've been.
                            </h4>
                         
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
