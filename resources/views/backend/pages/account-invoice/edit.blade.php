@extends('backend.layouts.app')
@section('content')
@section('title', '| Edit Account Invoice')
@section('header-title', 'Edit Account Invoice')
@section('breadcrumb', 'Edit Account Invoice')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/account-invoice/'.$data['id'].'','method'=>'put','files'=>true]) !!}
                        {!! Form::hidden('id',$data['id']) !!}
                        @include('backend.pages.account-invoice.form',['data'=>$data,'account'=>$account])
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