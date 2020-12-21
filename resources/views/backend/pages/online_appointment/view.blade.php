@extends('backend.layouts.app')
@section('content')
@section('title', '| View Appointments')
@section('header-title', 'View Appointments')
@section('breadcrumb', 'View Appointments')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/new_appointments') }}"> <i class="fa fa-list"></i>Appointments List</a>  
                    <a class="btn btn-primary" style="margin-left: 10px;" onclick="printDiv('printableArea')" tabindex="0"><span>Print</span></a>
                </div>
            </div>
            <div class="panel-body" id="printableArea">
                <div class="col-sm-12"> 
                    <div class="card">
                        <div class="card-header">
                        </div>
                        {{-- <div class="card-content">
                            <div class="card-content-member">
                                <h4 class="m-t-0">{{ $doctor->name }}</h4>
                                <p class="m-0"><i class="pe-7s-map-marker"></i>{{ $doctor->address }}</p>
                            </div>
                            <div class="card-content-languages">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Email:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->email }}
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Designation:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->designation }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Biography:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->biography }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Specialist:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->specialist }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Department:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->department }}
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Phone:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->phone }}
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Mobile:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->mobile }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>



                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Education/Degree:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->education }}
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Date of Birth:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->birthday }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Gender:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $doctor->gender == '1' ? 'Male' : 'Female' }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection