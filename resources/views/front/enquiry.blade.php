<div>
    <!-- Enquiry Start -->
    <div class="container-fluid py-1 background-image">
        <div class="container py-1">
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="row p-4" style="background-color: white;border-radius:20px; opacity:0.6;">
                    <div class="col-12">
                        @include('partials.sectionSuccessError')
                    </div>
                    <!-- Step 1 -->
                    <div id="step-1" class="step {{$currentStep == 1 ? 'd-block' : 'd-none'}}">
                        <h2>Do you know where you would like to travel?</h2>
                        <div class="btn-group-toggle" data-toggle="buttons">
                            <div class="row d-flex justify-content-center mb-4">
                                <div class="col-8">
                                    <label class="btn btn-outline-primary btn-radio {{$q1 == 'yes' ? 'checked' : ''}}">
                                        <input type="radio" name="travel_option" wire:click="setQ1('yes')" value="yes"
                                            autocomplete="off"> YES
                                    </label>
                                </div>
                                <div class="col-8">
                                    <label
                                        class="btn btn-outline-primary btn-radio {{$q1 == 'anywhere' ? 'checked' : ''}}">
                                        <input type="radio" name="travel_option" wire:click="setQ1('anywhere')"
                                            value="anywhere" autocomplete="off">
                                        ANYWHERE IN EAST AFRICA
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end text-end mb-4">
                            <button class="btn btn-outline-success mt-2" wire:click="setStep(2)">NEXT ></button>
                        </div>
                        <center>
                            <h6>This will take 1 minute to complete</h6>
                        </center>
                    </div>

                    <!-- Step 2 -->
                    <div id="step-2" class="step {{$currentStep == 2 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setStep(1)">
                            < Back</button>
                                <h2>Where would you like to travel?</h2>
                                <div class="btn-group-toggle" data-toggle="buttons">

                                    <div class="row d-flex justify-content-center">
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Kenya' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Kenya"
                                                    wire:click="setDestination('Kenya')"> KENYA
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Tanzania' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Tanzania"
                                                    wire:click="setDestination('Tanzania')"> TANZANIA
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Uganda' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Uganda"
                                                    wire:click="setDestination('Uganda')"> UGANDA
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Rwanda' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Rwanda"
                                                    wire:click="setDestination('Rwanda')"> RWANDA
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Zanzibar' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Zanzibar"
                                                    wire:click="setDestination('Zanzibar')">
                                                ZANZIBAR
                                            </label>
                                        </div>
                                        <div class="col-4">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$destination == 'Seychelles' ? 'checked' : ''}}">
                                                <input type="radio" name="destination" value="Seychelles"
                                                    wire:click="setDestination('Seychelles')">
                                                SEYCHELLES
                                            </label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end text-end">
                                        <button class="btn btn-outline-success mt-2" wire:click="setStep(3)">NEXT
                                            ></button>
                                    </div>
                                </div>
                    </div>

                    <!-- Step 3 -->
                    <div id="step-3" class="step {{$currentStep == 3 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setStep(2)">
                            < Back</button>
                                <h2>When would you like to travel?</h2>

                                <div class="btn-group-toggle" data-toggle="buttons">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-8">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$travelTime == 'exact' ? 'checked' : ''}}">
                                                <input type="radio" name="travel_time" value="exact"
                                                    wire:click="setTravelTime('exact')"> I KNOW EXACTLY WHEN
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$travelTime == 'rough' ? 'checked' : ''}}">
                                                <input type="radio" name="travel_time" value="rough"
                                                    wire:click="setTravelTime('rough')"> I HAVE A ROUGH IDEA
                                            </label>
                                        </div>
                                        <div class="col-8">
                                            <label
                                                class="btn btn-outline-primary btn-radio {{$travelTime == 'best' ? 'checked' : ''}}">
                                                <input type="radio" name="travel_time" value="best"
                                                    wire:click="setTravelTime('best')"> TELL ME WHEN
                                                IS
                                                BEST
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end text-end">
                                    <button class="btn btn-outline-success mt-2" wire:click="setStep(4)">NEXT ></button>
                                </div>
                    </div>

                    <!-- Step 4 -->
                    <div id="step-4" class="step {{$currentStep == 4 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setBack(3)">
                            < Back</button>
                                <h2>When would you like to travel?</h2>

                                <div class="row d-flex justify-content-center">
                                    <div class="col-6">
                                        <input type="date" class="form-control" wire:model="travelDateStart"
                                            style="border-radius: 5px; padding: 10px;">
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="form-control" wire:model="travelDateEnd"
                                            style="border-radius: 5px; padding: 10px;">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end text-end">
                                    <button class="btn btn-outline-success mt-2" wire:click="setStep(5)">NEXT ></button>
                                </div>
                    </div>

                    <!-- Step 5 -->
                    <div id="step-5" class="step {{$currentStep == 5 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2 d-none" wire:click="setBack(4)">
                            < Back</button>
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
                                    <button class="btn btn-outline-success mt-2" wire:click="setStep(6)">NEXT ></button>
                                </div>
                    </div>

                    <!-- Step 6 -->
                    <div id="step-6" class="step {{$currentStep == 6 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setBack(5)">
                            < Back</button>
                                <h2>How many travelers?</h2>
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
                                    <button class="btn btn-outline-success mt-2" wire:click="setStep(7)">NEXT ></button>
                                </div>
                    </div>

                    <!-- Step 7 -->
                    <div id="step-7" class="step {{$currentStep == 7 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setBack(6)">
                            < Back</button>
                                <h2>Tell us more about your trip</h2>
                                <textarea class="form-control" wire:model="tripDetails" row="3"
                                    placeholder="Are you traveling for a specific reason? Is there anything specific you would like to experience?"></textarea>

                                <div class="d-flex justify-content-end text-end">
                                    <button class="btn btn-outline-success mt-2" wire:click="setStep(8)">NEXT ></button>
                                    <button class="btn btn-outline-info mt-2" wire:click="setStep(8)">SKIP</button>
                                </div>
                    </div>

                    <!-- Step 8 -->
                    <div id="step-8" class="step {{$currentStep == 8 ? 'd-block' : 'd-none'}}">
                        <button class="btn btn-transparent mt-2" wire:click="setBack(7)">
                            < Back</button>
                                <h2>Your Details</h2>
                                <input class="form-control mt-1" type="email" wire:model="email"
                                    placeholder="Email Address">
                                <input class="form-control mt-1" type="text" wire:model="firstName"
                                    placeholder="First Name">
                                <input class="form-control mt-1" type="text" wire:model="country" placeholder="Country">
                                
                                <div class="mt-1">
                                    <label>Preferred method of contact:</label>
                                    <input type="radio" wire:model="contactMethod" value="email"> Email
                                    <input type="radio" wire:model="contactMethod" value="phone"> Phone
                                </div>
                                <div class="d-flex justify-content-end text-end">
                                    <button class="btn btn-outline-success mt-2" wire:click="submit">SUBMIT</button>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // document.addEventListener('DOMContentLoaded', () => {
    //     function getIp(callback) {
    //         fetch('ipinfo.io/140.82.183.34?token=66e2f39b20a2bd', { headers: { 'Accept': 'application/json' } })
    //             .then((resp) => resp.json())
    //             .catch(() => {
    //                 return {
    //                     country: 'us',
    //                 };
    //             })
    //             .then((resp) => callback(resp.country));
    //     }
    //     const phoneInputField = document.querySelector("#phone");
    //     const phoneInput = window.intlTelInput(phoneInputField, {
    //         utilsScript:
    //             "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    //     });
    //     $('#phone').on('input', function () {
    //         @this.set('phone', phoneInput.getNumber());
    //     })
    // });
    document.addEventListener('livewire:initialized', () => {
        function getIp(callback) {
            fetch('ipinfo.io/140.82.183.34?token=66e2f39b20a2bd', { headers: { 'Accept': 'application/json' } })
                .then((resp) => resp.json())
                .catch(() => {
                    return {
                        country: 'us',
                    };
                })
                .then((resp) => callback(resp.country));
        }
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            utilsScript:
                "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });
        $('#phone').on('input', function () {
            @this.set('phone', phoneInput.getNumber());
        })
    });
</script>