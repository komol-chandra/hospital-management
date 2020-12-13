<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital @yield('title')</title>
    @include('backend.layouts.css')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('backend.layouts.header')
          @include('backend.layouts.sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                     <form action="#" method="get" class="sidebar-form search-box pull-right hidden-md hidden-lg hidden-sm">
                            <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button type="submit" name="search" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>   
                    <div class="header-icon">
                        <i class="fa fa-tachometer"></i>
                    </div>
                    <div class="header-title">
                        <h1>@yield('header-title')</h1>
                        <small></small>
                        <ol class="breadcrumb hidden-xs">
                            <li><a href="i{{ url('/admin') }}"><i class="pe-7s-home"></i> Home</a></li>
                            <li class="active">@yield('breadcrumb')</li>
                        </ol>
                    </div>
                </section>
            <!-- Main content -->
            <section class="content">
                @yield('content')
            </div>
            @include('backend.layouts.footer')
                
            </div>
        </div>
    @include('backend.layouts.js')
    </body>
</html>