@extends('frontend.layouts.app')
@section('content')
@section('title', ' Dashboard')
<main id="content" role="main">
    <div class="gradient-half-primary-v1">
        <div class="container text-center space-top-4 space-top-md-4 space-top-lg-3 space-bottom-1">
            <div class="w-md-80 w-lg-50 mx-auto mb-5">
                <h1 class="h1 text-white">
                    <span class="font-weight-semi-bold">View  Dashboard</span>
                </h1>
            </div>
        </div>
    </div>


    <div class="bg-light">
        <div class="container space-2 space-md-2">
            <div class="m-t-25">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">Appointment </a>
                    </li>
                   
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    {{-- Profile View --}}
                    <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
                                    @php
                                    $start = $schedule->starting;
                                    $end = $schedule->ending;
                                    $startFormat = date('h:i a', strtotime($start));
                                    $endFormat = date('h:i a', strtotime($end));
                                    @endphp
                                    <a>Today Appointment Start From {{ $startFormat }} To {{ $endFormat }}</a>
                                    <table class="table table-bordered table-hover text-sm">
                                        <h4 class="text-center"> ToDay Appointment List</h4>
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Type of Patient</th>
                                                <th>Patient Name</th>
                                                <th>Message</th>
                                                <th>Appointment Time</th>
                                                <th>View More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($data as $key => $value)
                                            @php
                                                $time = $value->time;
                                                $format = date('h:i a', strtotime($time));
                                            @endphp
                                            <tr>
                                                <td>{{ $key +1}}</td>
                                                @if($value->type == 1)<td>New</td>
                                                @elseif($value->type == 2)<td>IN Month</td>
                                                @else<td>Report</td>
                                                @endif
                                                <td>{{ $value->users->full_name }}</td>
                                                <td>{{ $value->message }}</td>
                                                <td>{{ $format }}</td>
                                                <td></td>
                                                
                                            </tr>  
                                        </tbody>
                                        @empty
                                        <table>
                                            <tr class="text-danger text-center"><td>No Appointment ToDay</td></tr>
                                        </table>
                                                
                                                    {{-- <h4 class="text-danger" >  </h4> --}}
                                                
                                        @endforelse
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
      </div>

</main>
@endsection