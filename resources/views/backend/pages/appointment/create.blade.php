@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Appointment')
@section('header-title', 'Create Appointment')
@section('breadcrumb', 'Create Appointment')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/appointment') }}"> <i class="fa fa-list"></i>Appointment List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/appointment','method'=>'post','files'=>true]) !!}
                        @include('backend.pages.appointment.form')
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
<script>
    function getDoctor(){
        let id = $(department).val();
        $.ajax({
            url:`/admin/appointment/doctorId/${id}`,
            type:"get",
            dataType:"json",
            success:function(response){
                response.forEach(function(value,index){
                    console.log(value);
                    $('#doctor').append(`<option class="sectionOpt"  value="${value.id}" >${value.name}</option>`);

                })
            }
        })
        console.log(id);
    };
</script>

@endsection
