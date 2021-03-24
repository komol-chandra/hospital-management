@extends('frontend.layouts.app')
@section('content')
@section('title', ' Home')
<main id="content" role="main">
    <div class="u-hero-v1">
    @include('frontend.layouts.slider')
    </div>
    <hr class="my-0">
    <div class="overflow-hidden">
        <div class="container space-2 space-md-2">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-7 mb-7 mb-lg-0">
                    <div class="pr-md-4">
                        <div class="mb-7">
                            <span class="btn btn-xs btn-soft-success btn-pill mb-2">About</span>
                            <h2 class="text-primary">Welcome to Hospital </h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore provident placeat excepturi quasi, fugit quos officia perferendis aperiam accusantium earum explicabo id cum, recusandae aut mollitia, magnam aliquid iure totam?</p>
                        </div>
                        <a class="btn btn-sm btn-primary btn-wide transition-3d-hover"
                            href="home/about.html">
                            Learn More <span class="fas fa-angle-right ml-2"></span></a>
                    </div>
                </div>
                <div class="col-lg-5 position-relative">
                    <figure class="ie-ellipse-mockup">
                        {{-- <img class="js-svg-injector" src="{{ asset('frontend/assets/svg/illustrations/ellipse-mockup.svg')}}" alt="Image Description"
                        data-img-paths='[
                            {"targetId": "#SVGellipseMockupImg1", "newPath": "http://ekattor-school-erp.com/demo/v7/assets/frontend/ultimate/img/home_promo_1.png"}
                        ]'
                        data-parent="#SVGellipseMockup"> --}}
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <div class="container space-2 space-md-3">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
            <span class="btn btn-xs btn-soft-success btn-pill mb-2">Doctors</span>
            <h2 class="text-primary">Our Professional Doctors</span></h2>
        </div>
        <div class="js-slick-carousel u-slick u-slick--gutters-3 mb-7"
           data-slides-show="2"
           data-slides-scroll="2"
           data-pagi-classes=""
           data-responsive='[{
             "breakpoint": 554,
             "settings": {
               "slidesToShow": 1
             }
           }]'>

            
            @foreach($data as $key => $value)
            {{-- {{ $value->users }} --}}

            <div class="js-slide px-3">
                <!-- Team -->
                  <div class="row">
                      <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
                          <div class="w-100">
                              <h3 class="h5 mb-4">{{ $value->users->name }}</h3>
                          </div>
                          <div class="d-inline-block">
                              <span class="badge badge-primary badge-pill badge-bigger mb-3">{{ $value->departments->name }}</span>
                          </div>
                          <p class="font-size-1">{!! $value->biography !!}</p>
                          <ul class="list-inline mt-auto mb-0">
                              <li class="list-inline-item mx-0">
                              <a class="btn btn-sm btn-icon btn-soft-secondary"
                                  href="#">
                                  <span class="fab fa-facebook-f btn-icon__inner"></span>
                              </a>
                              </li>
                              <li class="list-inline-item mx-0">
                              <a class="btn btn-sm btn-icon btn-soft-secondary"
                                  href="#">
                                  <span class="fab fa-linkedin btn-icon__inner"></span>
                              </a>
                              </li>
                              <li class="list-inline-item mx-0">
                              <a class="btn btn-sm btn-icon btn-soft-secondary"
                                  href="#">
                                  <span class="fab fa-twitter btn-icon__inner"></span>
                              </a>
                              </li>
                          </ul>
                      </div>
                      <div class="col-sm-6">
                      <img class="img-fluid rounded mx-auto" 
                      src="/{{ $value->users->picture }} " style="height: 150px; width: 150px;"
                          alt="Doctor Image">
                      </div>
                </div>
                <!-- End Team -->
            </div>
            @endforeach


        </div>
        <center>
        <a class="btn btn-sm btn-primary btn-wide transition-3d-hover pull-right"
          href="{{ url('/frontend/doctor-view') }}">
            View More <span class="fas fa-angle-right ml-2"></span></a>
        </center>
        </div>
        <!-- End Slick Carousel -->
    </div>
    <!-- End Teacher Section -->

    <!-- Events Section -->
    {{-- <div class="bg-light">
        <div class="container space-2 space-md-3">
        <!-- Title -->
        <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
            <span class="btn btn-xs btn-soft-success btn-pill mb-2">Events</span>
            <h2 class="text-primary">Upcomig Events</h2>
        </div>
        <!-- End Title -->

        <!-- News Carousel -->
        <div class="js-slick-carousel u-slick u-slick--equal-height u-slick--gutters-2 mb-7"
                data-slides-show="4"
                data-slides-scroll="1"
                data-pagi-classes=""
                data-responsive='[{
                "breakpoint": 1200,
                "settings": {
                    "slidesToShow": 3
                }
                }, {
                "breakpoint": 554,
                "settings": {
                    "slidesToShow": 1
                }
                }]'>
        </div>
        <center>
        <a class="btn btn-sm btn-primary btn-wide transition-3d-hover pull-right"
            href="home/events.html">
            Learn More <span class="fas fa-angle-right ml-2"></span></a>
        </center>
        </div>
    </div> --}}
  </main>
@endsection
@section('js')

@endsection