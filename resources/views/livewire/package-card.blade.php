<div class="col-lg-4 col-md-6 mb-4 equal-height">
    <div class="package-item bg-white mb-2" style="height:100%;">
        <img class="img-fluid" 
             src="{{ \App\Helpers\HP::getImgUrl(!empty($pack->image_urls) ? explode(',', $pack->image_urls)[0] : $pack->destinations()->first()->image_url) }}" 
             alt="">

        <div class="p-4">
            <div class="d-flex justify-content-between mb-3">
                <small class="m-0">
                    <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                    @foreach($pack->destinations as $key => $dest)
                        {{ $dest->name }}{{ $key < $pack->destinations->count() - 1 ? ', ' : '' }}
                    @endforeach
                </small>
                <small class="m-0">
                    <i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $pack->number_of_days }} days
                </small>
            </div>

            <a class="h5 text-decoration-none" href="{{ route('packages', ['id' => \App\Helpers\HP::generateSlug($pack->id,$pack->name)]) }}" wire:navigate>
                {!! $pack->summary !!}
            </a>

            <div class="border-top mt-4 pt-4">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('packages', ['id' => \App\Helpers\HP::generateSlug($pack->id,$pack->name)]) }}" class="btn btn-primary border-radius" wire:navigate>
                        <i>Enquire now</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
