@extends('frontend.layouts.app')
@section('content')
@section('title', ' Doctor')
<main id="content" role="main">
    <div class="gradient-half-primary-v1">
        <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
            <div class="w-md-80 w-lg-50 mx-auto mb-5">
                <h1 class="h1 text-white">
                    <span class="font-weight-semi-bold">Our Doctors</span>
                </h1>
            </div>
        </div>
    </div>
    <div class="bg-light">
        <div class="container space-2 space-md-2">
            <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-9">
                <span class="btn btn-xs btn-soft-success btn-pill mb-2">Doctors</span>
                <h2 class="text-primary">Our Professional Doctors</span></h2>
            </div>
            <div class="row">
                @forelse($data as $value)
                <div class="col-md-6" style="padding: 30px;">
                    <div class="js-slick-carousel u-slick u-slick--gutters-3"
                    data-slides-show="1"
                    data-slides-scroll="2"
                    data-pagi-classes=""
                    data-responsive='[{
                    "breakpoint": 554,
                    "settings": {
                        "slidesToShow": 1
                    }
                    }]'>
                        <div class="js-slide px-3">
                            <div class="row">
                                <div class="col-sm-6 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
                                    <div class="w-100">
                                        <h3 class="h5 mb-4">{{ $value->name }}</h3>
                                    </div>
                                    <div class="d-inline-block">
                                        <span class="badge badge-primary badge-pill badge-bigger mb-3">Senior Lecturer</span>
                                    </div>
                                    <p class="font-size-1">Email: <span>{{ $value->email }}</span></p>
                                    <p class="font-size-1">{{ $value->biography }}</p>
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
                                

                                <div class="col-sm-5">
                                    <img class="img-fluid rounded mx-auto" src="/{{ $value->picture ?? 'backend/files/profile.jpg' }}"  alt="Alison Frami" style="border-radius: 100px !important;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <h2>no Doctor</h2>
                @endforelse

                
            </div>
        </div>
    </div>
</main>
@endsection