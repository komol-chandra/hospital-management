<header class="main-header">
    <a href="{{ url('/admin') }}" class="logo"> <!-- Logo -->
        <span class="logo-mini">
            <!--<b>A</b>H-admin-->
            {{-- <img src="{{ asset ('backend/assets/dist/img/mini-logo.png') }}" alt=""> --}}
            <img src="/{{ $settings->small_logo ?? 'backend/files/logo.png' }}" >
        </span>
        <span class="logo-lg">
            <!--<b>Admin</b>H-admin-->
            {{-- <img src="{{ asset ('backend/assets/dist/img/logo.png') }}" alt=""> --}}
            <img src="/{{ $settings->logo ?? 'backend/files/logo.png' }}" >

        </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top ">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <!-- Sidebar toggle button-->
            <span class="sr-only">Toggle navigation</span>
            <span class="fa fa-tasks"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li></li>
               
                <!-- user -->
                <li class="dropdown dropdown-user admin-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                    <div class="user-image">
                    <img src="{{ asset('backend/files/profile.jpg') }}" class="img-circle" height="40" width="40" alt="User Image">
                    </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/admin/user-profile') }}"><i class="fa fa-users"></i> User Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <form method="POST" action="{{ route('logout') }}">@csrf
                        <li><a style="padding-left: 13px;" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-sign-out"></i> Logout</a></li>
                        </form>
                            {{-- <x-jet-responsive-nav-link >
                                {{ __('Logout') }}
                            </x-jet-responsive-nav-link> --}}
                        
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>