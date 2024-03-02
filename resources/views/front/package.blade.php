<div x-data="{ scrollToDestination: true }" x-init="scrollToDestination && $nextTick(() => scrollTo('#packages'))">
    <div class="container-xxl py-5" id="packages">
        @if(!$showMore)
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Packages</h6>
                <h1 class="mb-5">Awesome Packages</h1>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($packages as $k => $v)
                @php
                if(empty($v->destinations->first()))
                {
                continue;
                }
                $dest = $v->destinations[0];
                if($dest->status===0){
                continue;
                }
                $img_url = $dest->image_url;
                @endphp
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="position-relative d-block overflow-hidden">
                            <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($v->destinations[0]->image_url)}}" alt="">
                            <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$v->destinations[0]->name}}</div>
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-money-bill-alt text-primary me-2"></i>{{$v->name}}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$v->number_of_days}} Days</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$v->number_of_people}} Person</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">{{number_format($v->price).' USD'}}</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <p>{!! substr(implode(' ', array_slice(explode(' ', strip_tags($v->description, '<br>')), 0, 30)), 0, 100) !!}...</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{route('package',['id'=>$v->id])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="{{route('package',['id'=>$v->id,'book'=>'book-now'])}}" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        {{-- Package read more --}}
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.5s">
                    <a class="position-relative d-block overflow-hidden" href="">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($package->destinations[0]->image_url)}}" alt="">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2"> {{$package->name .' - '. number_format($package->price).' USD'}}</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2"><i class="fa fa-map-marker-alt text-primary me-2"></i> {{$package->destinations[0]->name}}</div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp m-auto" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-money-bill-alt text-primary me-2"></i>{{$package->name}}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$package->number_of_days}} Days</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$package->number_of_people}} Person</small>
                        </div>
                        <div class="text-center p-4">
                            <h3 class="mb-0">{{number_format($package->price).' USD'}}</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{route('package')}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Back To Packages</a>
                                <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 wow fadeInUp m-auto" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="text-start p-4">
                            <h6 class="text-primary">Description</h6>
                            <p>{!! $package->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@push('scripts')
<script>
    function delayScroll(elementId, delay) {
        setTimeout(() => {
            scrollTo(elementId);
        }, delay);
    }

    function scrollTo(elementId) {
        const element = document.querySelector(elementId);

        if (element) {
            element.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
                inline: 'nearest'
            });
        }
    }
</script>
@endpush