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
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <i class="pe-7s-bell"></i>
                        <span class="label label-warning">8</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"><i class="fa fa-bell"></i> 8 Notifications</li>
                        <li>
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-inbox"></i> Inbox  <span class=" label-success label label-default pull-right">9</span></a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> New Order <span class=" label-success label label-default pull-right">3</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-money"></i> Payment Failed  <span class="label-success label label-default pull-right">6</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Order Confirmation <span class="label-success label label-default pull-right">7</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> Update system status <span class=" label-success label label-default pull-right">11</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> client update <span class="label-success label label-default pull-right">12</span> </a>
                                </li>
                                <li>
                                    <a href="#" class="border-gray"><i class="fa fa-cart-plus"></i> shipment cancel 
                                        <span class="label-success label label-default pull-right">2</span> </a>
                                    </li>
                                </ul><div class="slimScrollBar" style="background: rgb(0, 0, 0); width: 3px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 147.059px;"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
                            </li>
                            <li class="footer">
                               <a href="#"> See all Notifications <i class=" fa fa-arrow-right"></i></a>
                           </li>
                       </ul>
                   </li>
               
                <!-- user -->
                <li class="dropdown dropdown-user admin-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                    <div class="user-image">
                    <img src="/{{ Auth::user()->picture ?? 'backend/files/no-img.png' }}" class="img-circle" height="40" width="40" alt="User Image">
                    </div>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/admin/user-profile') }}"><i class="fa fa-users"></i> View Profile</a></li>
                        <li><a href="{{  url('/admin/user-profile/create')  }}"><i class="fa fa-gear"></i> Change Profile</a></li>
                        <li><a href="{{  url('/admin/password')  }}"><i class="fa fa-gear"></i> Change Password</a></li>
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