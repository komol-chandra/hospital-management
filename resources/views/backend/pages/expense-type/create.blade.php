
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Doctor')
@section('header-title', 'Create Doctor')
@section('breadcrumb', 'Create Doctor')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-head">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/expense') }}"> <i class="fa fa-list"></i>Doctor List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/expense','method'=>'post','files'=>true,"id"=>"form_insert"]) !!}
                        @include('backend.pages.expense-type.form')
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
{!! JsValidator::formRequest('App\Http\Requests\DoctorRequest', '#form_insert'); !!}
@endsection