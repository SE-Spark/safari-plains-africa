
    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-1">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h4>We offer high end All inclusive packages and Budget safaris</h4>
            </div>
            <div class="row">
                @forelse($destinations as $dest)
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="{{\App\Helpers\HP::getImgUrl($dest->image_url)}}" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="{{ route('destinations', ['id' => \App\Helpers\HP::generateSlug($dest->id,$dest->name)]) }}" wire:navigate>
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
        </div>
    </div>
    <!-- Destination Start -->