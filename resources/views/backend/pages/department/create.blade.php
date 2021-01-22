
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Department')
@section('header-title', 'Create Department')
@section('breadcrumb', 'Create Department')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/department') }}"> <i class="fa fa-list"></i>Department List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/department','method'=>'post',"id"=>"form_insert"]) !!}
                        @include('backend.pages.department.form')
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
@section('js')
{!! JsValidator::formRequest('App\Http\Requests\DoctorDepartmentRequest', '#form_insert'); !!}
{!! JsValidator::formRequest('App\Http\Requests\DoctorDepartmentRequest', '#form_update'); !!}
@endsection