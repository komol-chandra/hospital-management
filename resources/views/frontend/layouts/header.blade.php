<div class="u-header-center-aligned-nav__col">
    <!-- Logo -->
    <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center u-header__navbar-brand-text-white" href="{{ url('/') }}">
      <img src="/{{ $settings->logo ?? 'backend/files/logo.png'  }}" style="height:35px;" >
    </a>
    <!-- End Logo -->

    <!-- Responsive Toggle Button -->
    <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--white"
    aria-label="Toggle navigation"
    aria-expanded="false"
    aria-controls="navBar"
    data-toggle="collapse"
    data-target="#navBar">
    <span id="hamburgerTrigger" class="u-hamburger__box">
      <span class="u-hamburger__inner"></span>
    </span>
  </button>
  <!-- End Responsive Toggle Button -->
</div>