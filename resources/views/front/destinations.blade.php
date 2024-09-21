<div>
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Destination</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Destination</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    @include('front.components.booking')


    <!-- Destination Start -->
    <div class="container-fluid py-1">
        <div class="container pt-1 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Explore Top Destination</h1>
            </div>
            @if(!$showMore)
            <div class="row">
                @forelse($destinations as $dest)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($dest->image_url)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="{{route('destinations',['id'=>$dest->id])}}" wire:navigate>
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
            </div>
            @else
            <div class="row">
                <div class="col-lg-11">
                    <div class="pb-3">
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <h5 class="mb-3"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{$destination->name}}</h5>
                            <img class="img-fluid mono w-50 float-right ml-4 mb-2" src="{{\App\Helpers\HP::getImgUrl($destination->image_url)}}">
                            <div class="border-top mt-1 pt-1">
                                <div class="d-flex justify-content-between mb-3">
                                    <h6 class="m-0"><i class="fa fa-globe text-primary mr-2"></i>{{$destination->country->name}}</h6>
                                    <h5 class="m-0"><i class="fa fa-money-bill-alt text-primary mr-2"></i>{{$destination->packages->count()??0}} Packages</h5>
                                </div>
                            </div>
                            <p>{!! $destination->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h6 class="text-primary">Availables Packages</h6>
                </div>
                @forelse($destination->packages as $pack)
                @livewire('package-card', ['pack' => $pack])
                @empty
                <div class="col">
                    <p>No packages found</p>
                </div>
                @endforelse
            </div>
            @endif
        </div>
    </div>
    <!-- Destination Start -->
</div>