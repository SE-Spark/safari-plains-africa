@push('styles')
<style>
    .bg-bx-active{
        background-color: #aa6c39;
    }
    .bg-bx-normal{
        background-color: #14141F;
    }
</style>
@endpush
<div x-data="{ scrollToDestination: true }" x-init="scrollToDestination && $nextTick(() => delayScroll('#destinations',2000))">
    <div class="container-xxl py-5 destination" id="destinations">
        @if(!$showMore)
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
                <h1 class="mb-5">Popular Destination</h1>
            </div>
            <div class="mb-2">
                <div class="d-flex flex-row">
                    @if($countries->count() > 0)
                    <p style="margin-bottom: 0;">Filter by Country:</p>
                    @foreach($countries as $country)
                    <label class="pl-2 {{(int) $countryId === (int) $country->id? 'bg-bx-active':'bg-bx-normal'}}" 
                    style="display: inline-block;border-radius: 30px;color: #fff;padding-right: 10px;padding-left: 10px;margin-left:5px;">
                        <input type="radio" wire:model.live="countryId" value="{{ $country->id }}" hidden>
                        <!-- <a href="javascript:;" style="color: #fff;" wire:click='FilterDest($country->id)'>
                        {{ $country->name }}
                        </a>    -->
                        {{ $country->name }}                     
                    </label>
                    @endforeach
                    <label class="pl-4 bg-bx-active" 
                    style="display: inline-block;border-radius: 30px;padding-right: 10px;padding-left: 10px;margin-left:5px;">
                        <a href="javascript:;" style="color: #fff;" wire:click='ResetFilter'>Reset <i class="fa fa-times"></i></a>
                    </label>
                    @endif
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @forelse($destinations as $k => $v)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($v->image_url)}}" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$v->name}}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-money-bill text-primary me-2"></i>{{$v->packages->count()??0}} packages</small>
                        </div>
                        <div class="text-center p-4">
                            <p>{{implode(' ', array_slice(explode(' ', $v->description), 0, 30))}}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{route('destination',['id'=>$v->id])}}" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 30px 30px 30px;">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>No Destinations found</p>
                @endforelse
            </div>
        </div>
        @else
        {{-- Destination read more --}}
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-6 col-md-6 wow zoomIn" data-wow-delay="0.5s">
                    <a class="position-relative d-block overflow-hidden" href="">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($destination->image_url)}}" alt="">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">{{$destination->packages->count()??0}} packages</div>
                        <div class="bg-white text-primary fw-bold position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$destination->name}}</div>
                    </a>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInUp m-auto" data-wow-delay="0.1s">
                    <div class="package-item">
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$destination->name}}</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-money-bill text-primary me-2"></i>{{$destination->packages->count()??0}} packages</small>
                        </div>
                        <div class="text-start p-4">
                            <h6 class="text-primary">Description</h6>
                            <p>{{$destination->description}}</p>
                        </div>
                    </div>
                </div>
                <h6 class="text-center text-primary">Available Packages</h6>
                <div class="col-12">
                    <div class="row g-4 justify-content-center">
                        @foreach($destination->packages as $k => $package)
                        @php
                        $dest = $package->destinations[0];
                        if($dest->status===0){
                        continue;
                        }
                        $img_url = $dest->image_url;
                        @endphp
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="package-item">
                                <div class="overflow-hidden">
                                    <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($package->destinations[0]->image_url)}}" alt="">
                                </div>
                                <div class="d-flex border-bottom">
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$package->name}}</small>
                                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>{{$package->number_of_days}} Days</small>
                                    <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$package->number_of_people}} Person</small>
                                </div>
                                <div class="text-center p-4">
                                    <h3 class="mb-0">{{number_format($package->price).' KES'}}</h3>
                                    <div class="mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>
                                    <p>{{$package->description}}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="#" class="btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                        <a href="#" class="btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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