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
                    <div class="user-widget list-group">
                        <div class="list-group-item heading">
                            <img class="media-object img-circle" src="{{ asset('backend/files/profile.jpg') }}" alt="">
                            <div class="text-wrap">
                                <h4 class="list-group-item-heading">Richard Willams</h4>
                                <p class="list-group-item-text">15,421 followers</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <a href="#" class="list-group-item">
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
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection