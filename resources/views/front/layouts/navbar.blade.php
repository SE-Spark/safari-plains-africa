<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><img src="{{asset('logo.png')}}" alt="Logo"> Bonanza</h1>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{route('home')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'home') active @endif">Home</a>
                <a href="{{route('destination')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'destination') active @endif">Destination</a>
                <a href="{{route('package')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'package') active @endif">Packages</a>

                {{--
                <a href="{{route('about')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'about') active @endif">About</a>
                <a href="{{route('service')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'service') active @endif">Services</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle @if(in_array(request()->route()->getName() ,['destination','booking','team','testimonial','404'])) active @endif" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('destination')}}" wire:navigate class="dropdown-item @if(request()->route()->getName() == 'destination') active @endif">Destination</a>
                        <a href="{{route('booking')}}" wire:navigate class="dropdown-item @if(request()->route()->getName() == 'booking') active @endif">Booking</a>
                        <a href="{{route('team')}}" wire:navigate class="dropdown-item @if(request()->route()->getName() == 'team') active @endif">Travel Guides</a>
                        <a href="{{route('testimonial')}}" wire:navigate class="dropdown-item @if(request()->route()->getName() == 'testimonial') active @endif">Testimonial</a>
                        <a href="{{route('404')}}" wire:navigate class="dropdown-item @if(request()->route()->getName() == '404') active @endif">404 Page</a>
                    </div>
                </div>
                --}}
                <a href="{{route('contact')}}" wire:navigate class="nav-item nav-link @if(request()->route()->getName() == 'contact') active @endif">Contact</a>
            </div>
            <a href="{{route('login',['account'=>'signin'])}}" class="btn btn-primary rounded-pill py-2 px-4" style="margin-right:20px !important;">Login</a>
            <a href="{{route('login',['account'=>'signup'])}}" class="btn btn-primary rounded-pill py-2 px-4">Register</a>
        </div>
    </nav>
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-center py-5">
                <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                    <p class="fs-4 text-white mb-4 animated slideInDown">Bonanza Adventures Tours & Travel Ltd</p>
                    <div class="position-relative w-75 mx-auto animated slideInDown">
                        <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Diani">
                        <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>