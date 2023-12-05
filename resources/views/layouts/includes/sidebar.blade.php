<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link @if(request()->route()->getName() == 'admin.dashboard') active @else collapsed @endif" href="{{route('admin.dashboard')}}" wire:navigate>
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(request()->route()->getName() == 'admin.destinations') active @else collapsed @endif" href="{{route('admin.destinations')}}" wire:navigate>
        <i class="bi bi-airplane"></i><span>Destinations</span>
      </a>
    </li>{{--
    <li class="nav-item">
      <a class="nav-link @if(request()->route()->getName() == 'admin.hotels') active @else collapsed @endif" href="{{route('admin.hotels')}}" wire:navigate>
        <i class="bi bi-menu-button-wide"></i><span>Hotels</span>
      </a>
    </li>--}}
    <li class="nav-item">
      <a class="nav-link @if(request()->route()->getName() == 'admin.packages') active @else collapsed @endif" href="{{route('admin.packages')}}" wire:navigate>
        <i class="bi bi-box"></i><span>Packages</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(request()->route()->getName() == 'admin.reviews') active @else collapsed @endif" href="{{route('admin.reviews')}}" wire:navigate>
        <i class="bi bi-yelp"></i><span>Reviews</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(!in_array(request()->route()->getName(),['admin.item-types','admin.booking-items','admin.booking'])) collapsed @endif " data-bs-target="#booking-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-book"></i><span>Booking</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="booking-nav" class="nav-content @if(in_array(request()->route()->getName(),['admin.item-types','admin.booking-items','admin.booking'])) show @else collapse @endif  " data-bs-parent="#sidebar-nav">
        <li>
          <a class="@if(request()->route()->getName() == 'admin.item-types') active @endif" href="{{route('admin.item-types')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>items type</span>
          </a>
        </li>
        <li>
          <a class="@if(request()->route()->getName() == 'admin.booking-items') active @endif" href="{{route('admin.booking-items')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>items </span>
          </a>
        </li>
        <li>
          <a class="@if(request()->route()->getName() == 'admin.booking') active @endif" href="{{route('admin.booking')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>booking</span>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link @if(!in_array(request()->route()->getName(),['admin.category','admin.posts'])) collapsed @endif" data-bs-target="#blog-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-file-post"></i><span>Blog</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="blog-nav" class="nav-content @if(in_array(request()->route()->getName(),['admin.category','admin.posts'])) show @else collapse @endif " data-bs-parent="#sidebar-nav">        
        <li>
          <a class="@if(request()->route()->getName() == 'admin.category') active @endif" href="{{route('admin.category')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>Category</span>
          </a>
        </li>
        <li>
          <a class="@if(request()->route()->getName() == 'admin.posts') active @endif" href="{{route('admin.posts')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>Posts</span>
          </a>
        </li>
        {{--
        <li>
          <a href="/">
            <i class="bi bi-circle"></i><span>Home</span>
          </a>
        </li>
        <li>
          <a href="/">
            <i class="bi bi-circle"></i><span>Gallary</span>
          </a>
        </li>
        <li>
          <a href="/">
            <i class="bi bi-circle"></i><span>Contact us</span>
          </a>
        </li>
        --}}
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link  @if(!in_array(request()->route()->getName(),['admin.users'])) collapsed @endif" data-bs-target="#admin-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-5-circle"></i><span>Administration</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="admin-nav" class="nav-content  @if(in_array(request()->route()->getName(),['admin.users'])) show @else collapse @endif " data-bs-parent="#sidebar-nav">

        <li>
          <a class="@if(request()->route()->getName() == 'admin.users') active @endif" href="{{route('admin.users')}}" wire:navigate>
            <i class="bi bi-circle"></i><span>users</span>
          </a>
        </li>
        {{--
        <li>
          <a href="/roles" wire:navigate>
            <i class="bi bi-circle"></i><span>Role</span>
          </a>
        </li>
        <li>
          <a href="/logs" wire:navigate>
            <i class="bi bi-circle"></i><span>Logs</span>
          </a>
        </li>
        --}}
      </ul>
    </li>
    {{--
    <li class="nav-item">
      <a class="nav-link collapsed" href="/notifications" wire:navigate>
        <i class="bi bi-bell"></i>
        <span>Notifications</span>
      </a>
    </li>--}}
    <li class="nav-item">
      <a class="nav-link collapsed" href="/profile" wire:navigate>
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li>

  </ul>

</aside>