<div>
    <!-- Header Start -->
    <div class="container-fluid page-header">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                <h3 class="display-4 text-white text-uppercase">Packages</h3>
                <div class="d-inline-flex text-white">
                    <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                    <i class="fa fa-angle-double-right pt-1 px-3"></i>
                    <p class="m-0 text-uppercase">Packages</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    @include('front.components.booking')


    <!-- Packages Start -->
    <div class="container-fluid py-2">
        <div class="container pt-1 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Packages</h6>
                <h1>Pefect Tour Packages</h1>
            </div>
            @if(!$showMore)
                <div class="row toprow">
                    @forelse($packages as $pack)
                        @livewire('package-card', ['pack' => $pack])
                    @empty
                        <div class="col">
                            <p>No packages found</p>
                        </div>
                    @endforelse                    
                </div>
            @else
                <div class="row">
                    <div class="col-md-10 col-sm-12 mb-4">
                        <div class="pb-3">
                            <div class="bg-white mb-3" style="padding: 30px; border-radius:8px;">
                                <img class="img-fluid mono w-50 float-left mr-4 mb-4"
                                    src="{{\App\Helpers\HP::getImgUrl($package->destinations()->first()->image_url)}}">

                                <h3 class="mb-3">{!!$package->summary!!}</h3>
                                <div class="d-flex justify-content-between mb-3">
                                    <small class="m-0"><i
                                            class="fa fa-map-marker-alt text-primary mr-2"></i>{{$package->destinations()->first()->name}}</small>
                                    <small class="m-0"><i
                                            class="fa fa-calendar-alt text-primary mr-2"></i>{{$package->number_of_days}}
                                        days</small>
                                    {{--<small class="m-0"><i
                                            class="fa fa-user text-primary mr-2"></i>{{$package->number_of_people}}
                                        Person</small>--}}
                                </div>
                                <div class="border-top mt-1 pt-1">
                                    <div class="d-flex justify-content-between mb-3">
                                        {{--<h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5
                                            <small>(250)</small>
                                        </h6>
                                        <h5 class="m-0">${{number_format($package->price)}}</h5>--}}
                                    </div>
                                    <div class="d-flex justify-content-between mb-3"
                                        x-data="{ goBack: function() { window.history.back(); } }">
                                        <a href="javascript:;" class="btn btn-primary border-radius mr-4"
                                            data-toggle="modal" data-target="#createEnquireModal"><i>Enquire Now</i></a>
                                        <a href="javascript:;" x-on:click="goBack"
                                            class="btn btn-primary  border-radius">Back</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bg-white mb-3" style="padding: 30px; border-radius:8px;">
                            <p>{!!$package->description!!} </p>
                            <div class="border-top mt-1 pt-1">
                                <div class="d-flex justify-content-between mb-3"
                                    x-data="{ goBack: function() { window.history.back(); } }">
                                    <a href="javascript:;" class="btn btn-primary border-radius mr-4" data-toggle="modal"
                                        data-target="#createEnquireModal"><i>Enquire Now</i></a>
                                    <a href="javascript:;" x-on:click="goBack"
                                        class="btn btn-primary  border-radius">Back</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="modal fade" id="createEnquireModal" tabindex="-1" role="dialog"
                    aria-labelledby="createEnquireModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-bottom">
                        <div class="modal-content" style="height:100%;">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createUpdateModalLabel">Enquiry</h5>
                            </div>
                            <div class="modal-body">
                                <!-- <img class="img-fluid"
                            src="{{ \App\Helpers\HP::getImgUrl(!empty($package->image_urls) ? explode(',', $package->image_urls)[0] : $package->destinations()->first()->image_url) }}"
                            alt=""> -->
                                <div class="p-4">
                                    <a class="h5 text-decoration-none" href="javascript:;">
                                        {!! $package->summary !!}
                                    </a>
                                    <div class="d-flex justify-content-between mb-3">
                                        <small class="m-0">
                                            <i class="fa fa-map-marker-alt text-primary mr-2"></i>
                                            {{$package->destinations->pluck('name')->implode(',')}}
                                        </small>
                                    </div>
                                    <h4>Enquire Now</h4>
                                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                        @include('partials.sectionSuccessError')
                                        <div class="form-row">
                                            <div class="control-group col-sm-6">
                                                <input type="text"
                                                    class="form-control p-4 @error('name') is-invalid @enderror"
                                                    wire:model="name" id="name" placeholder="Your Name" required="required"
                                                    data-validation-required-message="Please enter your name" />
                                                <p class="help-block text-danger">@error('name'){{$message}}@enderror</p>
                                            </div>
                                            <div class="control-group col-sm-6">
                                                <input type="email"
                                                    class="form-control p-4 @error('email') is-invalid @enderror"
                                                    wire:model="email" id="email" placeholder="Your Email"
                                                    required="required"
                                                    data-validation-required-message="Please enter your email" />
                                                <p class="help-block text-danger">@error('email'){{$message}}@enderror</p>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <input type="text"
                                                class="form-control p-4 @error('subject') is-invalid @enderror"
                                                wire:model="subject" id="subject" placeholder="Subject" required="required"
                                                data-validation-required-message="Please enter a subject" />
                                            <p class="help-block text-danger">@error('subject'){{$message}}@enderror</p>
                                        </div>
                                        <div class="control-group">
                                            <textarea class="form-control py-3 px-4 @error('message') is-invalid @enderror"
                                                wire:model="message" rows="5" id="message" placeholder="Message"
                                                required="required"
                                                data-validation-required-message="Please enter your message"></textarea>
                                            <p class="help-block text-danger">@error('message'){{$message}}@enderror</p>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary mr-2" wire:click.prevent="saveEnquery()">Send
                                                Message</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Packages End -->
</div>