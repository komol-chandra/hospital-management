
@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Medicine')
@section('header-title', 'Edit Medicine')
@section('breadcrumb', 'Edit Medicine')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/medicine') }}"> <i class="fa fa-list"></i>Medicine List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/medicine/'.$data['id'].'','method'=>'put']) !!}
                    @include('backend.pages.medicine.form',['data'=>$data,'getMedicineType'=>$getMedicineType,'getGeneric'=>$getGeneric,'getManufacturer'=>$getManufacturer])
                    {!! Form::hidden('id',$data['id']) !!}
                        <div class="col-sm-12 reset-button">
                            <button type="submit" class="btn btn-success">update</button>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection