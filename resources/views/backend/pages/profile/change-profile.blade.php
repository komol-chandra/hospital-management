@extends('backend.layouts.app')
@section('content')
@section('title', '| Change Profile')
@section('header-title', 'Change Profile')
@section('breadcrumb', 'Change Profile')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-body row">
                {!! Form::open(['url' => '/admin/user-profile/'.$data['id'].'','method'=>'put','files'=>true]) !!}
                {!! Form::hidden('id',$data['id']) !!}    
                <div class="col-sm-12">
                    <div class="col-sm-6 form-group">
                        <label>Name <span class="text-danger">*</span></label>
                        {!! Form::text("name",  $data['name']  ?? null, ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        {!! Form::text("full_name", $data['full_name'] ?? null, ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Address</label>
                        {!! Form::text("address", $data['address'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label>Mobile <span class="text-danger">*</span></label>
                        {!! Form::number("mobile", $data['mobile'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    
                    
                    <div class="col-sm-6 form-group">
                        <label>Date of Birth <span class="text-danger">*</span></label>
                        {!! Form::date("birthday", $data['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Gender <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <label class="radio-inline"></label>
                            @if(isset($data))
                            {!! Form::radio("gender",1,$data['gender'] == 1 ? true : false) !!}
                            {!! Form::label("male","Male") !!}
                            {!! Form::radio("gender",2,$data['gender'] == 2 ? true : false) !!}
                            {!! Form::label("female","Female") !!}
                            @else
                            {!! Form::radio("gender",1) !!}
                            {!! Form::label("male","Male") !!}
                            {!! Form::radio("gender",2) !!}
                            {!! Form::label("female","Female") !!}
                            @endif
                            
                        </div>
                    </div>
                    
                    <div class="col-sm-6 form-group">
                        <label >Picture upload</label>
                        {!! Form::file("picture", null,["class"=>"form-control"]) !!}
                    </div>
                    
                </div>
                <div class="col-sm-12 reset-button">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>

</script>
@endsection