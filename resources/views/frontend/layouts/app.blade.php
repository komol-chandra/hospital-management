<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Hospital | @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Creativeitem" name="author" />
{{-- <link rel="shortcut icon" href="/{{ $settings->favicon ?? null }}"> --}}
{{-- <img src="/{{ $settings->favicon ?? null }}" > --}}

<link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
@include('frontend.layouts.css')
  </head>
  <body>
<header id="header" class="u-header u-header--bg-transparent u-header--white-nav-links-md u-header--sub-menu-dark-bg-md u-header--abs-top"
data-header-fix-moment="500"
data-header-fix-effect="slide">
<div class="u-header__section">
  <div id="logoAndNav" class="container">
    <nav class="js-mega-menu navbar navbar-expand-md u-header__navbar u-header__navbar--no-space">
      @include('frontend.layouts.header')
    @include('frontend.layouts.navigation')
  </nav>
</div>
</div>
</header>
<!-- ========== END HEADER ========== -->

    <!-- ========== MAIN ========== -->
@yield('content')
    @include('frontend.layouts.footer')
    @include('frontend.layouts.js')
    </body>
</html>
