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
        top: 0;
        /* Start at the very top */
        width: 2px;
        height: 100%;
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
        top: 0;
        /* Push marker to the top of the step */
        width: 12px;
        height: 12px;
        background-color: #666;
        border-radius: 50%;
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
<div class="container-fluid">
    <h1>{{$package->name}}</h1>
    <p>{{$package->tag}}</p>

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
                        <p style="color: gray; font-size: 18px;">{{$item['location']}}</p>
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
        <div class="col-md-6 col-12">
            <h2>Itinerary in Detail</h2>
            {!! $package->iternary_details !!}
            <a href="{{route('enquiry')}}" class="btn btn-primary mt-3">Start Planning</a>
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
    <div class="journeys mb-2">
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
                                <div class="col-md-6 col-6">
                                    <h3>{{ $step['days'] }}</h3>
                                    <h4>{{ $step['location'] }}</h4>
                                </div>
                                <div class="col-md-6 col-6">
                                    <p>{{ $step['description'] }}</p>

                                </div>
                            </div>
                            <div class="row d-flex content-justify-center">
                                <div class="col-md-6">
                                    @if ($step['image'])
                                        <img src="{{ asset('assets/images/' . $step['image']) }}" class="img-fluid mt-3"
                                            alt="{{ $step['location'] }}">
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
                                        <h5 class="stay-location">{{ $step['stay_location'] }}</h5>
                                        <h4 class="stay-name">{{ $step['stay_name'] }}</h4>
                                        <p class="stay-description">{{ $step['stay_description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
        <a href="{{route('enquiry')}}" class="btn btn-primary mt-3">Book now</a>
    </div>

</div>