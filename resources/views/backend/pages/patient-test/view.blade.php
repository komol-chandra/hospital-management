@extends('backend.layouts.app')
@section('content')
@section('title', '| View Patient Test')
@section('header-title', 'View Patient Test')
@section('breadcrumb', 'View Patient Test')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/patient-test') }}"> <i class="fa fa-list"></i>Patient Test List</a>  
                    <a class="btn btn-primary" style="margin-left: 10px;" onclick="printDiv('printableArea')" tabindex="0"><span>Print</span></a>
                </div>
            </div>
            <div class="panel-body" id="printableArea">
                <div class="col-sm-12"> 
                    <div class="card">
                        <div class="card-header">
                            {{-- <img src="/{{ $doctor->picture ?? 'backend/files/profile.jpg' }}" class="img-circle" alt="User Image" height="150" width="150"> --}}
                        </div>
                        <div class="card-content">
                            {{-- <div class="card-content-member">
                                <h4 class="m-t-0">{{ $doctor->name }}</h4>
                                <p class="m-0"><i class="pe-7s-map-marker"></i>{{ $doctor->address }}</p>
                            </div> --}}
                            <div class="card-content-languages">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Test Type:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $data->tests->name }}
                                                        <div class="fluency fluency-4"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Doctor Name:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $data->doctors->name }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Biography:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $data->patients->name }}</li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-content-languages-group">
                                            <div>
                                                <h4>Specialist:</h4>
                                            </div>
                                            <div>
                                                <ul>
                                                    <li>{{ $data->details }}</li>
                                                    
                                                </ul>
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
</div>
@endsection