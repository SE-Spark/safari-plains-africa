<style>
    /* Trip Highlights Section */
    .trip-highlights {
        width: 100%;
        margin: 15px;
    }

    /* Section Title */
    .section-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    /* Highlight List Styling */
    .highlight-list {
        list-style: none;
        padding: 0;
    }

    .highlight-list li {
        position: relative;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
        /* Thin line under each item */
        font-size: 16px;
        color: #333;
    }

    /* Bullet Point Styling */
    .highlight-list li::before {
        content: "•";
        color: #666;
        font-weight: bold;
        font-size: 18px;
        position: absolute;
        left: -15px;
        top: 50%;
        transform: translateY(-50%);
    }


    .journey-timeline {
        position: relative;
        padding-left: 30px;
        /* Space for the vertical line */
    }

    /* Vertical line that now starts at the very top */
    .journey-timeline::before {
        content: "";
        position: absolute;
        left: 5px;
        /* Align with marker */
        top: 75px;
        /* Start at the very top */
        width: 2px;
        height: calc(100% - 75px);
        /* background-color: #ccc; */
        border-left: 2px dashed #ccc;
    }

    .journey-step {
        position: relative;
        padding: 20px 0;
    }

    .marker {
        position: absolute;
        left: -31px;
        /* Adjust so that the circle centers on the line */
        top: 75px;
        /* Push marker to the top of the step */
        width: 12px;
        height: 12px;
        background-color: #666;
        border-radius: 50%;
    }

    .end-marker {
        position: absolute;
        left: -31px;
        /* Adjust so that the circle centers on the line */
        bottom: 0;
        /* Push marker to the top of the step */
        width: 12px;
        height: 12px;
        background-color: #688;
        border-radius: 50%;
    }

    .end-marker-text {
        position: absolute;
        /*left: -31px;*/
        /* Adjust so that the circle centers on the line */
        bottom: -22px;
        /* Push marker to the top of the step */
        width: 100%;
    }

    .details {
        padding-left: 20px;
    }

    .where-to-stay {
        text-align: center;
        margin: 40px 0;
    }

    .stay-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .stay-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        max-width: 900px;
        margin: auto;
        background-color: #e5e5e5;
        padding: 20px;
        border-radius: 10px;
    }

    .stay-image img {
        max-width: 300px;
        border-radius: 10px;
    }

    .stay-details {
        flex: 1;
        text-align: left;
        padding: 10px;
    }

    .stay-location {
        color: #a08f6a;
        font-size: 18px;
    }

    .stay-name {
        font-size: 22px;
        font-weight: bold;
    }

    .stay-description {
        font-size: 16px;
        color: #6d6d6d;
    }
</style>
<div class="container">
    <h1>{{$package->name}}</h1>
    {{--<p>{{$package->tag}}</p>--}}

    <div class="row">
        <div class="col-md-2 col mb-2">
            <p><b>Duration</b> <br> {{$package->number_of_days}} days</p>
        </div>
        <div class="col-md-2 col mb-2">
            <p><b>Price</b> <br> {{ $package->price }}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-2">
            <img src="{{ \App\Helpers\HP::getImgUrl(!empty($package->image_urls) ? explode(',', $package->image_urls)[0] : $package->destinations()->first()->image_url) }}"
                style="width: 100%; height: auto;" alt="default Image">
        </div>
    </div>
    <h5>Destinations</h5>
    <div class="row">
        @foreach (json_decode($package->dest_days, true) ?? [] as $item)
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-1" style="background-color: #ddd;">
                    <div style="flex: 1;padding: 15px;">
                        <h5 style="color: darkred; font-weight: bold;">{{$item['days']}}</h5>
                        <p style="color: gray; font-size: 18px;">
                            {{isset($item['stay_location']) ? $item['stay_location'] : $item['location']}}</p>
                    </div>
                    <div style="width: 170px; height: 100%; overflow: hidden;">
                        @if (!empty($item['image']) && $item['image'] != '')
                            <img src="{{ asset('assets/images/' . $item['image']) }}" style="width: 100%; height: auto;"
                                alt="Destination Image">
                        @endif
                    </div>
                </div>
            </div>
        @endforeach

    </div>


    <!-- Itinerary in detail -->
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            <h2>Itinerary in Detail</h2>
        </div>
        <div class="col-md-6 col-12">
            {!! $package->iternary_details !!}
            {{-- <a href="javascript:;" class="btn btn-primary mt-3" data-toggle="modal"
                data-target="#createEnquireModal">Start Planning</a> --}}
                <a href="{{ route('enquiry',['slug'=> \App\Helpers\HP::generateSlug($package->id,$package->name)]) }}" class="btn btn-primary mt-3">Book
        now</a>
        </div>
        <div class="col-md-6 col-12 p-4" style="background-color: #BAAD85 !important;">
            {!! $package->haves_and_not_haves !!}
        </div>
    </div>

    <!-- Trip Highlights Section -->
    <div class="trip-highlights mt-5">
        <h2 class="section-title">Trip Highlights</h2>
        <div class="row">
            @foreach (json_decode($package->trip_highlights, true) ?? [] as $step)
                <div class="col-md-6">
                    <ul class="highlight-list">
                        <li>{{$step['name']}}</li>

                    </ul>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Journey Details Section -->
    <div class="journeys d-flex justify-content-center mb-2">
        <h2>Journey Details</h2>
    </div>

    <div class="journey-timeline">
        @foreach (json_decode($package->dest_days, true) ?? [] as $step)
            <div class="journey-step">
                <div class="marker"></div>
                <div class="details">
                    <div class="row mt-5">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-6">
                                    <p style="font-size: 20px;">{{ $step['days'] }}</p>
                                    <br />
                                    <br />
                                    <h3>{{ $step['location'] }}</h3>
                                </div>
                                <div class="col-md-8 col-6">
                                    <p>{{ $step['description'] }}</p>

                                </div>
                            </div>
                            <div class="row d-flex justify-content-end pt-3">
                                <div class="col-md-8 col-12">
                                    @if ($step['image'])
                                        <img src="{{ asset('assets/images/' . $step['image']) }}"
                                            style="width: 100%; height: auto;" alt="{{ $step['location'] }}">
                                    @endif

                                </div>
                            </div>
                        </div>
                        @if ($step['stay_location'])
                            <div class="where-to-stay">
                                <h3 class="stay-title">Where to stay</h3>
                                <div class="stay-container">
                                    <div class="stay-image">
                                        <img src="{{ asset('assets/images/' . $step['stay_loc_image']) }}" class="img-fluid"
                                            alt="{{ $step['stay_name'] }}">
                                    </div>
                                    <div class="stay-details">
                                        <center>
                                            <h5 class="stay-location">{{ $step['stay_location'] }}</h5>
                                            <h4 class="stay-name">{{ $step['stay_name'] }}</h4>
                                        </center>
                                        <p class="stay-description">{{ $step['stay_description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                @if ($loop->last)
                    <div class="end-marker"></div>
                    <p class="end-marker-text">** End of Safari **</p>
                @endif
            </div>
        @endforeach

    </div>

    <a href="{{ route('enquiry',['slug'=> \App\Helpers\HP::generateSlug($package->id,$package->name)]) }}" class="btn btn-primary mt-3">Book
        now</a>


    <div wire:ignore.self class="modal fade" id="createEnquireModal" tabindex="-1" role="dialog"
        aria-labelledby="createEnquireModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-bottom">
            <div class="modal-content" style="height:100%;">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUpdateModalLabel">Enquiry</h5>
                </div>
                <div class="modal-body">
                    <div class="p-4">
                        <a class="h5 text-decoration-none" href="javascript:;">
                            {!! $package->name !!}
                        </a>
                        <div class="row">
                            <div class="col-md-2 col mb-2">
                                <p><b>Duration</b> <br> {{$package->number_of_days}} days</p>
                            </div>
                            <div class="col-md-2 col mb-2">
                                <p><b>Price</b> <br> {{ $package->price }}</p>
                            </div>
                        </div>
                        <h4>Enquire Now</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="row p-4" style="background-color: white;border-radius:20px; opacity:0.6;">
                                <div class="col-12">
                                    @include('partials.sectionSuccessError')
                                </div>


                                <!-- Step 1 -->
                                <div id="step-1" class="step {{$currentStep == 1 ? 'd-block' : 'd-none'}}">
                                    <h2>Who are you travelling with?</h2>

                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-6">
                                                <label
                                                    class="btn btn-outline-primary btn-radio {{$travelCompanions == 'couple' ? 'checked' : ''}}">
                                                    <input type="radio" name="travel_companions" value="couple"
                                                        wire:click="setTravelCompanions('couple')"> COUPLE
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label
                                                    class="btn btn-outline-primary btn-radio {{$travelCompanions == 'solo' ? 'checked' : ''}}">
                                                    <input type="radio" name="travel_companions" value="solo"
                                                        wire:click="setTravelCompanions('solo')"> SOLO
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label
                                                    class="btn btn-outline-primary btn-radio {{$travelCompanions == 'family' ? 'checked' : ''}}">
                                                    <input type="radio" name="travel_companions" value="family"
                                                        wire:click="setTravelCompanions('family')"> FAMILY
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label
                                                    class="btn btn-outline-primary btn-radio {{$travelCompanions == 'friends' ? 'checked' : ''}}">
                                                    <input type="radio" name="travel_companions" value="friends"
                                                        wire:click="setTravelCompanions('friends')"> FRIENDS
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end text-end">
                                        <button class="btn btn-outline-success mt-2" wire:click="setStep(2)">NEXT
                                            ></button>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div id="step-2" class="step {{$currentStep == 2 ? 'd-block' : 'd-none'}}">
                                    <button class="btn btn-transparent mt-2" wire:click="setStep(1)">
                                        < Back</button>
                                            <h2>Who are you travelling with?</h2>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Adults Ages 18+:</label>
                                                </div>
                                                <div class="col-6">
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="incrementAdults">+</button>
                                                    <span>{{ $adults }}</span>
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="decrementAdults">-</button>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Teenagers Ages 13-17:</label>
                                                </div>
                                                <div class="col-6">
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="incrementTeenagers">+</button>
                                                    <span>{{ $teenagers }}</span>
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="decrementTeenagers">-</button>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Children Ages 0-12:</label>
                                                </div>
                                                <div class="col-6">
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="incrementChildren">+</button>
                                                    <span>{{ $children }}</span>
                                                    <button style="border-radius: 5px; padding: 10px;"
                                                        wire:click="decrementChildren">-</button>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end text-end">
                                                <button class="btn btn-outline-success mt-2"
                                                    wire:click="setStep(3)">NEXT ></button>
                                            </div>
                                </div>

                                <!-- Step 3 -->
                                <div id="step-8" class="step {{$currentStep == 3 ? 'd-block' : 'd-none'}}">
                                    <button class="btn btn-transparent mt-2" wire:click="setStep(2)">
                                        < Back</button>
                                            <h2>Your Details</h2>
                                            <input class="form-control mt-1" type="email" wire:model="email"
                                                placeholder="Email Address">
                                            <input class="form-control mt-1" type="text" wire:model="firstName"
                                                placeholder="First Name">
                                            <input class="form-control mt-1" type="text" wire:model="country"
                                                placeholder="Country">
                                            <input class="form-control mt-1" type="tel" wire:model="phone"
                                                placeholder="Phone">
                                            <div>
                                                <label>Preferred method of contact:</label>
                                                <input type="radio" wire:model="contactMethod" value="email"> Email
                                                <input type="radio" wire:model="contactMethod" value="phone"> Phone
                                            </div>
                                            <div class="d-flex justify-content-end text-end">
                                                <button class="btn btn-outline-success mt-2"
                                                    wire:click="submit">SUBMIT</button>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>