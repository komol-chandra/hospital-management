@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Patient')
@section('header-title', 'Create Patient')
@section('breadcrumb', 'Create Patient')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/patient') }}"> <i class="fa fa-list"></i>Patient List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/patient','method'=>'post','files'=>true,"id"=>"form_insert"]) !!}
                    @include('backend.pages.patient.user-form')
                    @include('backend.pages.patient.form')
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
{!! JsValidator::formRequest('App\Http\Requests\PatientRequest', '#form_insert'); !!}
@endsection