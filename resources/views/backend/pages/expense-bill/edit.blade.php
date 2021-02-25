@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Patient Test')
@section('header-title', 'Edit Patient Test')
@section('breadcrumb', 'Edit Patient Test')

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
                    {!! Form::open(['url' => '/admin/patient-test/'.$data['id'].'','method'=>'put','files'=>true]) !!}
                        {!! Form::hidden('id',$data['id']) !!}
                        @include('backend.pages.patient-test.form',['data'=>$data,'patient'=>$patient,'test'=>$test])
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