 <div>

     <!-- Header Start -->
     <div class="container-fluid page-header">
         <div class="container">
             <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
                 <h3 class="display-4 text-white text-uppercase">Contact</h3>
                 <div class="d-inline-flex text-white">
                     <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                     <i class="fa fa-angle-double-right pt-1 px-3"></i>
                     <p class="m-0 text-uppercase">Contact</p>
                 </div>
             </div>
         </div>
     </div>
     <!-- Header End -->

     @livewire('home-filter-card')


     <!-- Contact Start -->
     <div class="container-fluid py-1">
         <div class="container py-4">
             <div class="text-center mb-3 pb-3">
                 <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Get in Touch</h6>
                
             </div>
             <div class="row justify-content-center">
                <div class="col-lg-8">
                    <p>
                    We're here to help you plan the safari adventure of your dreams! Whether you're seeking more information about our tailor-made safaris, need assistance with bookings, or have any special requests, feel free to reach out to us.<br><br>
                    Our dedicated team is ready to answer your questions and provide expert guidance for your journey across Kenya, Tanzania, Uganda, Rwanda, Zanzibar, and beyond.
                    </p>
                </div>
                 <div class="col-lg-8">
                     <div class="contact-form bg-white" style="padding: 30px;">
                        <div>
                            <h6>Let's Start Your Journey!</h6>
                            <p>
                            Ready to book or need more info? Fill out our form below, and we’ll get back to you shortly.
                            </p>
                        </div>
                         <div id="success"></div>
                         <form name="sentMessage" id="contactForm" novalidate="novalidate">
                             @include('partials.sectionSuccessError')
                             <div class="form-row">
                                 <div class="control-group col-sm-6">
                                     <input type="text" class="form-control p-4 @error('name') is-invalid @enderror" wire:model="name" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                                     <p class="help-block text-danger">@error('name'){{$message}}@enderror</p> 
                                 </div>
                                 <div class="control-group col-sm-6">
                                     <input type="email" class="form-control p-4 @error('email') is-invalid @enderror" wire:model="email" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                                     <p class="help-block text-danger">@error('email'){{$message}}@enderror</p> 
                                 </div>
                             </div>
                             <div class="control-group">
                                 <input type="text" class="form-control p-4 @error('subject') is-invalid @enderror" wire:model="subject" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                                 <p class="help-block text-danger">@error('subject'){{$message}}@enderror</p> 
                             </div>
                             <div class="control-group">
                                 <textarea class="form-control py-3 px-4 @error('message') is-invalid @enderror" wire:model="message" rows="5" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                                 <p class="help-block text-danger">@error('message'){{$message}}@enderror</p> 
                             </div>
                             <div class="text-center">
                                 <button class="btn btn-primary py-3 px-4" wire:click.prevent="saveEnquery()">Send Message</button>
                             </div>
                         </form>
                         <div class="mt-5">
                            <p> 
                                <center>
                                <i>
                                We look forward to welcoming you into the Safari Plains family!
                                </i>
                                </center>
                            </p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Contact End -->
 </div>