@extends('backend.layouts.app')
@section('content')
@section('title', '| View profile')
@section('header-title', 'View profile')
@section('breadcrumb', 'View profile')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            {{-- <div class="panel-heading">
                <div class="btn-group"> 
                </div>
            </div> --}}
            <div class="panel-body">
                <div class="col-sm-12">
                    {{-- <div class="user-widget list-group">
                        <div class="list-group-item heading">
                            <img class="media-object img-circle" src="/{{ $data->picture ?? 'backend/files/profile.jpg' }}" alt="">
                            <div class="text-wrap">
                                <h4 class="list-group-item-heading">{{ $data['name'] }}</h4>
                            </div>
                            <div class="clearfix"></div>
                        </div> --}}
                        <div class="row">
                            <div class="review-block">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="review-block-img">
                                            <img src="/{{ $data->picture ?? 'backend/files/profile.jpg' }}" class="img-rounded" alt="">
                                        </div>
                                        <div class="review-block-name"><a href="#">{{ $data->full_name }}</a></div>
                                        <div class="review-block-date">Birthday: {{ $data->birthday }}</div>
                                        <div class="review-block-date">Name: {{ $data->name }}</div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="review-block-title">Login As:
                                            @if($data->type ==1)
                                                {{ "Admin" }}
                                            @endif
                                        </div>
                                        <div class="review-block-description">Address: {{ $data->address }}</div>
                                        <div class="review-block-description">Email: {{ $data->email }}</div>
                                        <div class="review-block-description">Call: {{ $data->mobile }}</div>
                                        <div class="review-block-description">gender: 
                                            @if($data->gender ==1)
                                                {{ 'Male' }}
                                            @else
                                            {{ 'Female' }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        {{-- <a href="{{ url('/admin/user-profile/create') }}" class="list-group-item">
                            <i class="fa fa-user fa-lg pull-right"></i>
                            <p class="list-group-item-text">Edit user</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-bar-chart-o fa-lg pull-right"></i>
                            <p class="list-group-item-text">Web statistics</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-wrench fa-lg pull-right"></i>
                            <p class="list-group-item-text">Upload settings</p>
                        </a>
                        <a href="#" class="list-group-item">
                            <i class="fa fa-calendar fa-lg pull-right"></i>
                            <p class="list-group-item-text">Events</p>
                        </a> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection