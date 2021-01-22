@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Schedule')
@section('header-title', 'Create Schedule')
@section('breadcrumb', 'Create Schedule')
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
                    {!! Form::open(['url' => '/admin/schedule','method'=>'post',"id"=>"form_insert"]) !!}
                    @include('backend.pages.schedule.form')
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
{!! JsValidator::formRequest('App\Http\Requests\ScheduleRequest', '#form_insert'); !!}
@endsection