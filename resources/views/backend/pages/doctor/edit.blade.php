@extends('backend.layouts.app')
@section('content')
@section('title', '| Update Doctor')
@section('header-title', 'Update Doctor')
@section('breadcrumb', 'Update Doctor')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/doctor') }}"> <i class="fa fa-list"></i>Doctor List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12"> 
                    {!! Form::open(['url' => '/admin/doctor/'.$doctor['id'].'','method'=>'put','files'=>true]) !!}
                        @include('backend.pages.doctor.form',[ 'doctor'=> $doctor,'departments' => $departments, 'bloods' => $bloods])
                        {!! Form::hidden('id',$doctor['id']) !!}    
                    <div class="col-sm-12 reset-button">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection