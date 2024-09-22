<!-- Booking Start -->
<div class="container  booking mt-5 pb-1">
    <div class="container-fluid  pb-1">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <form class="bg-light shadow" style="padding: 15px;border-radius:20px">
                    <div class="row align-items-center" style="min-height: 40px;">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" wire:model="country"
                                            wire:change="dispatch('updatedPropertySelection')" style="height: 47px;">
                                            <option selected>Country</option>
                                            @foreach($country_options as $k => $v)
                                                <option>{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 mb-md-0">
                                        <select class="custom-select px-4" wire:model="destination"
                                            style="height: 47px;">
                                            <option selected>Destination</option>
                                            @foreach($dest_options as $k => $v)
                                                <option>{{$v->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-primary btn-block" type="button"
                                style="height: 47px; margin-top: -2px;"
                                wire:click.prevent="filterSearch()">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Booking End -->