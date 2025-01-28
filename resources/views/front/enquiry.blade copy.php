<div>
    <!-- Enquiry Start -->
    <div class="container-fluid py-1 background-image">
        <div class="container py-1">
            <form>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="row">
                    <!-- Step 1 -->
                    <div id="step-1" class="step">
                        <h2>Do you know where you would like to travel?</h2>
                        <button wire:click="setStep(2)">YES</button>
                        <button wire:click="setStep(2)">ANYWHERE IN EAST AFRICA</button>
                    </div>

                    <!-- Step 2 -->
                    <div id="step-2" class="step" style="display: none;">
                        <h2>Where would you like to travel?</h2>
                        <button wire:click="setDestination('Kenya')">KENYA</button>
                        <button wire:click="setDestination('Tanzania')">TANZANIA</button>
                        <button wire:click="setDestination('Uganda')">UGANDA</button>
                        <button wire:click="setDestination('Rwanda')">RWANDA</button>
                        <button wire:click="setDestination('Zanzibar')">ZANZIBAR</button>
                        <button wire:click="setDestination('Seychelles')">SEYCHELLES</button>
                        <button wire:click="setStep(3)">NEXT ></button>
                    </div>

                    <!-- Step 3 -->
                    <div id="step-3" class="step" style="display: none;">
                        <h2>When would you like to travel?</h2>
                        <button wire:click="setTravelTime('exact')">I KNOW EXACTLY WHEN</button>
                        <button wire:click="setTravelTime('rough')">I HAVE A ROUGH IDEA</button>
                        <button wire:click="setTravelTime('best')">TELL ME WHEN IS BEST</button>
                        <button wire:click="submit">NEXT ></button>
                    </div>

                    <!-- Step 4 -->
                    <div id="step-4" class="step" style="display: none;">
                        <h2>When would you like to travel?</h2>
                        <input type="date" wire:model="travelDateStart">
                        <input type="date" wire:model="travelDateEnd">
                        <button wire:click="setStep(5)">NEXT ></button>
                    </div>

                    <!-- Step 5 -->
                    <div id="step-5" class="step" style="display: none;">
                        <h2>Who are you travelling with?</h2>
                        <button wire:click="setTravelCompanions('couple')">COUPLE</button>
                        <button wire:click="setTravelCompanions('solo')">SOLO</button>
                        <button wire:click="setTravelCompanions('family')">FAMILY</button>
                        <button wire:click="setTravelCompanions('friends')">FRIENDS</button>
                        <button wire:click="setStep(6)">NEXT ></button>
                    </div>

                    <!-- Step 6 -->
                    <div id="step-6" class="step" style="display: none;">
                        <h2>How many travelers?</h2>
                        <div>
                            <label>Adults Ages 18+:</label>
                            <button wire:click="incrementAdults">+</button>
                            <span>{{ $adults }}</span>
                            <button wire:click="decrementAdults">-</button>
                        </div>
                        <div>
                            <label>Teenagers Ages 13-17:</label>
                            <button wire:click="incrementTeenagers">+</button>
                            <span>{{ $teenagers }}</span>
                            <button wire:click="decrementTeenagers">-</button>
                        </div>
                        <div>
                            <label>Children Ages 0-12:</label>
                            <button wire:click="incrementChildren">+</button>
                            <span>{{ $children }}</span>
                            <button wire:click="decrementChildren">-</button>
                        </div>
                        <button wire:click="setStep(6)">NEXT ></button>
                    </div>
                    <!-- Step 7 -->
                    <div id="step-7" class="step" style="display: none;">
                        <h2>Tell us more about your trip</h2>
                        <textarea wire:model="tripDetails"
                            placeholder="Are you traveling for a specific reason? Is there anything specific you would like to experience?"></textarea>
                        <button wire:click="setStep(8)">NEXT ></button>
                        <button wire:click="setStep(8)">SKIP</button>
                    </div>

                    <!-- Step 8 -->
                    <div id="step-8" class="step" style="display: none;">
                        <h2>Your Details</h2>
                        <input type="email" wire:model="email" placeholder="Email Address">
                        <input type="text" wire:model="firstName" placeholder="First Name">
                        <input type="text" wire:model="surname" placeholder="Surname">
                        <div>
                            <label>Preferred method of contact:</label>
                            <input type="radio" wire:model="contactMethod" value="email"> Email
                            <input type="radio" wire:model="contactMethod" value="phone"> Phone
                        </div>
                        <button wire:click="submit">SUBMIT</button>
                    </div>
                </div>
                </div>
            </form>
            <form>
                <div class="row">
                    <!-- Step 1 -->
                    <div id="step-1" class="step">
                        <h2>Do you know where you would like to travel?</h2>
                        <label>
                            <input type="radio" name="travel_option" wire:click="setStep(2)" value="yes"> YES
                        </label>
                        <label>
                            <input type="radio" name="travel_option" wire:click="setStep(2)" value="anywhere"> ANYWHERE
                            IN EAST AFRICA
                        </label>
                    </div>

                    <!-- Step 2 -->
                    <div id="step-2" class="step" style="display: none;">
                        <h2>Where would you like to travel?</h2>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Kenya')"> KENYA
                        </label>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Tanzania')"> TANZANIA
                        </label>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Uganda')"> UGANDA
                        </label>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Rwanda')"> RWANDA
                        </label>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Zanzibar')"> ZANZIBAR
                        </label>
                        <label>
                            <input type="radio" name="destination" wire:click="setDestination('Seychelles')"> SEYCHELLES
                        </label>
                        <button wire:click="setStep(3)">NEXT ></button>
                    </div>

                    <!-- Step 3 -->
                    <div id="step-3" class="step" style="display: none;">
                        <h2>When would you like to travel?</h2>
                        <label>
                            <input type="radio" name="travel_time" wire:click="setTravelTime('exact')"> I KNOW EXACTLY
                            WHEN
                        </label>
                        <label>
                            <input type="radio" name="travel_time" wire:click="setTravelTime('rough')"> I HAVE A ROUGH
                            IDEA
                        </label>
                        <label>
                            <input type="radio" name="travel_time" wire:click="setTravelTime('best')"> TELL ME WHEN IS
                            BEST
                        </label>
                        <button wire:click="setStep(4)">NEXT ></button>
                    </div>

                    <!-- Step 4 -->
                    <div id="step-4" class="step" style="display: none;">
                        <h2>When would you like to travel?</h2>
                        <input type="date" wire:model="travelDateStart">
                        <input type="date" wire:model="travelDateEnd">
                        <button wire:click="setStep(5)">NEXT ></button>
                    </div>

                    <!-- Step 5 -->
                    <div id="step-5" class="step" style="display: none;">
                        <h2>Who are you travelling with?</h2>
                        <label>
                            <input type="radio" name="travel_companions" wire:click="setTravelCompanions('couple')">
                            COUPLE
                        </label>
                        <label>
                            <input type="radio" name="travel_companions" wire:click="setTravelCompanions('solo')"> SOLO
                        </label>
                        <label>
                            <input type="radio" name="travel_companions" wire:click="setTravelCompanions('family')">
                            FAMILY
                        </label>
                        <label>
                            <input type="radio" name="travel_companions" wire:click="setTravelCompanions('friends')">
                            FRIENDS
                        </label>
                        <button wire:click="setStep(6)">NEXT ></button>
                    </div>

                    <!-- Step 6 -->
                    <div id="step-6" class="step" style="display: none;">
                        <h2>How many travelers?</h2>
                        <div>
                            <label>Adults Ages 18+:</label>
                            <button wire:click="incrementAdults">+</button>
                            <span>{{ $adults }}</span>
                            <button wire:click="decrementAdults">-</button>
                        </div>
                        <div>
                            <label>Teenagers Ages 13-17:</label>
                            <button wire:click="incrementTeenagers">+</button>
                            <span>{{ $teenagers }}</span>
                            <button wire:click="decrementTeenagers">-</button>
                        </div>
                        <div>
                            <label>Children Ages 0-12:</label>
                            <button wire:click="incrementChildren">+</button>
                            <span>{{ $children }}</span>
                            <button wire:click="decrementChildren">-</button>
                        </div>
                        <button wire:click="setStep(7)">NEXT ></button>
                    </div>

                    <!-- Step 7 -->
                    <div id="step-7" class="step" style="display: none;">
                        <h2>Tell us more about your trip</h2>
                        <textarea wire:model="tripDetails"
                            placeholder="Are you traveling for a specific reason? Is there anything specific you would like to experience?"></textarea>
                        <button wire:click="setStep(8)">NEXT ></button>
                        <button wire:click="setStep(8)">SKIP</button>
                    </div>

                    <!-- Step 8 -->
                    <div id="step-8" class="step" style="display: none;">
                        <h2>Your Details</h2>
                        <input type="email" wire:model="email" placeholder="Email Address">
                        <input type="text" wire:model="firstName" placeholder="First Name">
                        <input type="text" wire:model="surname" placeholder="Surname">
                        <div>
                            <label>Preferred method of contact:</label>
                            <input type="radio" wire:model="contactMethod" value="email"> Email
                            <input type="radio" wire:model="contactMethod" value="phone"> Phone
                        </div>
                        <button wire:click="submit">SUBMIT</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>