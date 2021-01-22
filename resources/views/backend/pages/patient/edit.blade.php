@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Patient')
@section('header-title', 'Edit Patient')
@section('breadcrumb', 'Edit Patient')
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
                    {!! Form::open(['url' => '/admin/patient/'.$patient['id'].'','method'=>'put','files'=>true,"id"=>"form_update"]) !!}
                    @include('backend.pages.patient.form',['patient'=>$patient,'bloods'=>$bloods])
                    {!! Form::hidden('id',$patient['id']) !!}
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
@section('js')
{!! JsValidator::formRequest('App\Http\Requests\PatientRequest', '#form_update'); !!}
@endsection