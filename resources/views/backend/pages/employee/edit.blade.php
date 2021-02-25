@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit employee')
@section('header-title', 'Edit employee')
@section('breadcrumb', 'Edit employee')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/employee') }}"> <i class="fa fa-list"></i>employee List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/employee/'.$data['id'].'','method'=>'put','files'=>true]) !!}
                    @include('backend.pages.employee.form',['data'=>$data])
                    {!! Form::hidden('id',$data['id']) !!}
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