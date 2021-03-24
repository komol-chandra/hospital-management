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
                    <li class="nav-item">
                        <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">Prescription</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    {{-- Profile View --}}
                    <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
                                    <table class="table table-bordered table-hover text-sm">
                                        <h4 class="text-center">Appointment List</h4>
                                        <thead>
                                            <tr>
                                                <th>Day</th>
                                                <th>Doctor Name</th>
                                                <th>Department Name</th>
                                                <th>Payment Amount</th>
                                                <th>Payment Status</th>
                                                <th>Appointment Time</th>
                                                <th>Serial No</th>
                                                <th>View More</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @forelse($appointment as $key => $value)
                                            @php
                                                $time = $value->time;
                                                $format = date('h:i a', strtotime($time));
                                            @endphp
                                            <tr>
                                                <td>{{ $value->date }}</td>
                                                <td>{{ $value->doctors->full_name }}</td>
                                                <td>{{ $value->departments->name }}</td>
                                                <td>{{ $value->payment_amount }}</td>
                                                @if($value->payment_status == 0)
                                                <td>pending</td>
                                                @else<td>Done</td>
                                                @endif
                                                <td>{{ $format }}</td>
                                                <td>{{ $value->serial_no }}</td>
                                                <td></td>
                                                
                                            </tr>  
                                            @empty
                                                <tr>
                                                    <td class="text-danger"> No Appointment </td>
                                                </tr>
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Update Profile --}}
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-pane fade active show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-sm-12 d-sm-flex align-content-sm-start flex-sm-column text-center text-sm-left mb-7 mb-sm-0">
                                                <table class="table table-bordered table-hover text-sm">
                                                    <h4 class="text-center">Prescription List</h4>
                                                    <thead>
                                                        <tr>
                                                            <th>Day</th>
                                                            <th>Doctor Name</th>
                                                            <th>View More</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        @forelse($prescription as $key => $value)
                                                        <tr>
                                                            <td>{{ $value->date }}</td>
                                                            <td>{{ $value->doctor->full_name }}</td>
                                                            <td>
                                                            <a class="btn btn-info btn-xs" href="{{url('user/view-dashboard/'.$value->id)}}"><i class="fa fa-eye"></i></a> 
                                                            </td>
                                                            
                                                        </tr>  
                                                        @empty
                                                            <tr>
                                                                <td class="text-danger"> No Prescription </td>
                                                            </tr>
                                                        @endforelse
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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