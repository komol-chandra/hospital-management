@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Schedule')
@section('header-title', 'Edit Schedule')
@section('breadcrumb', 'Edit Schedule')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/schedule') }}"> <i class="fa fa-list"></i>Schedule List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/schedule/'.$schedule['id'].'','method'=>'put']) !!}
                    @include('backend.pages.schedule.form',['doctors'=>$doctors,'days'=>$days,'schedule'=>$schedule])
                    {!! Form::hidden('id',$schedule['id']) !!}
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