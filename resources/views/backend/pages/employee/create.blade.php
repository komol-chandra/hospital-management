@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Employee')
@section('header-title', 'Create Employee')
@section('breadcrumb', 'Create Employee')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/employee') }}"> <i class="fa fa-list"></i>Employee List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/employee','method'=>'post','files'=>true]) !!}
                    @include('backend.pages.employee.form')
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