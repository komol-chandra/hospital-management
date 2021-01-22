
@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Department')
@section('header-title', 'Edit Department')
@section('breadcrumb', 'Edit Department')
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
                    {!! Form::open(['url' => '/admin/department/'.$department['id'].'','method'=>'put',"id"=>"form_update"]) !!}
            @include('backend.pages.department.form',$department)
            {!! Form::hidden('id',$department['id']) !!}
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