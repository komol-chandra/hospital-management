
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Patient Test')
@section('header-title', 'Create Patient Test')
@section('breadcrumb', 'Create Patient Test')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-head">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/patient-test') }}"> <i class="fa fa-list"></i>Doctor List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/patient-test','method'=>'post','files'=>true]) !!}
                        @include('backend.pages.patient-test.form')
                        <div class="col-sm-12 reset-button">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

   
@endsection