<div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">
    <ul class="navbar-nav u-header__navbar-nav">
      <li class="nav-item u-header__nav-item active">
        <a class="nav-link u-header__nav-link"
        href="{{ url('/frontend/index') }}">Home</a>
      </li>
      <li class="nav-item u-header__nav-item active">
          <a class="nav-link u-header__nav-link"
          href="{{ url('/frontend/appointment') }}">Appointment</a>
        </li>
      <li class="nav-item u-header__nav-item ">
        <a class="nav-link u-header__nav-link"
        href="{{ url('/frontend/doctor-view') }}">Doctors</a>
      </li>
      
        @if(Auth::guard('admin')->check())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::guard('admin')->user()->name}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/user/view-profile') }}">View Profile</a>
              <a class="dropdown-item" href="#">change Profile</a>
              <a class="dropdown-item" href="#">change Password</a>
              <a class="dropdown-item" href="{{ url('user/logout') }}">Logout</a>
            </div>
          </li>
        @else
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Login/Register
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('/login') }}">Admin Login</a>
              <a class="dropdown-item" href="{{ url('/user/login-view') }}">User Login</a>
              <a class="dropdown-item" href="{{ url('/user/register') }}">User register</a>
            </div>
          </li>
        @endif
    </ul>
  </div>