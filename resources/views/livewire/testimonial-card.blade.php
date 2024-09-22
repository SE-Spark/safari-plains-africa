@if(!empty($testimonials))
<div class="container-fluid py-1">
    <div class="container py-1">
        <div class="text-center mb-3 pb-3">
            <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimonial</h6>
            <h1>What Our Clients Say</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            @foreach ($testimonials as $testimonial)
                <div class="text-center pb-4">
                    <div class="testimonial-text bg-white p-4 mt-5">
                        <h5 class="text-truncate">{{$testimonial->name}}</h5>
                        <p>{{$testimonial->message}}</p>
                        <span><b>{{$testimonial->profession}}</b></span>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="py-2 d-flex justify-content-center">
            <a class="btn btn-primary" href="https://www.tripadvisor.com/Attraction_Review-g294207-d13511263-Reviews-Safari_Plains_Africa_Ltd-Nairobi.html"target="_blank">Read More</a>
        </div>
    </div>
</div>
@endif