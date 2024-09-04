 {{--<!-- Navbar Start -->
 <!-- <div class="container-fluid position-relative nav-bar p-0">
     <div class="container-fluid position-relative p-0 px-lg-3" style="z-index: 9;">
         <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
             <img src="{{asset('logo.jpeg')}}" alt="" style="width: 100px; height: 50px;">
             <a href="" class="navbar-brand">
                 <h4 class="m-0 text-primary">SAFARI PLAINS AFRICA</h4>
             </a>
             <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                 <div class="navbar-nav ml-auto py-0">
                     <a href="{{route('home')}}" class="nav-item nav-link @if(request()->route()->getName()==='home') active @endif" wire:navigate>Home</a>
                     <a href="{{route('packages')}}" class="nav-item nav-link @if(request()->route()->getName()==='packages') active @endif" wire:navigate>Tour Packages</a>
                     <a href="{{route('destinations')}}" class="nav-item nav-link @if(request()->route()->getName()==='destinations') active @endif" wire:navigate>Destination</a>
                     <a href="{{route('blog')}}" class="nav-item nav-link @if(request()->route()->getName()==='blog') active @endif" wire:navigate>Blog</a>
                     <a href="{{route('contact')}}" class="nav-item nav-link @if(request()->route()->getName()==='contact') active @endif" wire:navigate>Contact</a>

                     <div class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                         <div class="dropdown-menu border-0 rounded-0 m-0">@guest
                             <a href="{{route('login',['account'=>'signin'])}}" class="dropdown-item">login</a>
                             <a href="{{route('login',['account'=>'signup'])}}" class="dropdown-item">Signup</a>
                             @else
                             <a href="{{route('admin.dashboard')}}" class="dropdown-item">Dashboard</a>
                             <a href="{{route('user.logout')}}" class="dropdown-item">Logout</a>
                             @endif
                         </div>
                     </div>

                 </div>
             </div>
         </nav>
     </div>
 </div> -->
 <!-- Navbar End -->--}}
<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="container-fluid position-relative p-0 nav-bar-nano px-lg-3" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pr-3 pl-3 pl-lg-5">
            <img src="{{asset('logo.jpeg')}}" alt="" style="width: 100px; height: 50px;">
            <a href="" class="navbar-brand">
                <h4 class="m-0 text-primary">SAFARI PLAINS AFRICA</h4>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="{{route('home')}}" class="nav-item nav-link @if(request()->route()->getName()==='home') active @endif" wire:navigate>Home</a>
                    <a href="{{route('packages')}}" class="nav-item nav-link @if(request()->route()->getName()==='packages') active @endif" wire:navigate>Tour Packages</a>
                    <a href="{{route('destinations')}}" class="nav-item nav-link @if(request()->route()->getName()==='destinations') active @endif" wire:navigate>Destination</a>
                    {{--<a href="{{route('blog')}}" class="nav-item nav-link @if(request()->route()->getName()==='blog') active @endif" wire:navigate>Blog</a>--}}
                    <a href="{{route('contact')}}" class="nav-item nav-link @if(request()->route()->getName()==='contact') active @endif" wire:navigate>Contact</a>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Account</a>
                        <div class="dropdown-menu border-0 rounded-0 m-0">@guest
                            <a href="{{route('login',['account'=>'signin'])}}" class="dropdown-item">login</a>
                            <a href="{{route('login',['account'=>'signup'])}}" class="dropdown-item">Signup</a>
                            @else
                            <a href="{{route('admin.dashboard')}}" class="dropdown-item">Dashboard</a>
                            <a href="{{route('user.logout')}}" class="dropdown-item">Logout</a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->

