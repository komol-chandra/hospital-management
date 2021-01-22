@extends('backend.layouts.app')
@section('content')
@section('title', '| View Doctor')
@section('header-title', 'View Doctor')
@section('breadcrumb', 'View Doctor')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div class="panel-body" id="printableArea">
                <div class="row">
                    <div class="col-sm-6 ">
                        <img src="/{{ $settings->logo ?? 'backend/files/profile.jpg' }}" class="img" alt="User Image" height="50" width="150">
                    </div>
                    <div class="col-sm-6 text-right float-left">
                        <address>
                            <strong >{{ $settings->title }}</strong><br>
                            {{ $settings->address }}<br>
                            <abbr title="Phone">P:</abbr>{{ $settings->contact }}<br>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </address>
                    </div>
                </div> <hr>
                <div class="card shadow-none mt-3 border border-light">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="media mb-3">
                                    <h2 class="text-danger text-center">Notice</h2>
                                    <img src="/{{ $data->user->picture ?? 'backend/files/avatar1.png' }}" class="rounded-circle mr-3 mail-img shadow" alt="media image"  width="100" height="100">
                                      <div class="media-body">
                                         <span class="media-meta float-right">{{ $data->today_time }}</span>
                                         <h4 class="text-primary m-0">{{ $data->user->name }}</h4>
                                         <small class="text-muted">{{ $data->user->email }}</small>
                                       </div>
                                   </div> <!-- media -->
                                   <h4 class="text-center">{{ $data->name }}</h4>
                                   <h5 class="text-right">{{ $data->start_date }}:Starting Date</h5>
                                   <h5 class="text-right">{{ $data->end_date }}:Ending Date</h5>
                                   <address>{!! $data->designation !!}</address>
                                   <hr>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection