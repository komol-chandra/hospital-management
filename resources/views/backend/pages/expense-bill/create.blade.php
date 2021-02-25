
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create expense-bill')
@section('header-title', 'Create expense-bill')
@section('breadcrumb', 'Create expense-bill')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-head">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/expense-bill') }}"> <i class="fa fa-list"></i>expense bill List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/expense-bill','method'=>'post','files'=>true]) !!}
                        @include('backend.pages.expense-bill.form',['expenseType'=>$expenseType])

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