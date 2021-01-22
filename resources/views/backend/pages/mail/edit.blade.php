@extends('backend.layouts.app')
@section('content')
@section('title', '| Update notice')
@section('header-title', 'Update notice')
@section('breadcrumb', 'Update notice')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/notice') }}"> <i class="fa fa-list"></i>notice List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12"> 
                    {!! Form::open(['url' => '/admin/notice/'.$data['id'].'','method'=>'put','files'=>true,"id"=>"form_edit"]) !!}
                        @include('backend.pages.notice.form',[ 'data'=> $data])
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
@section('js')
<script src="{{asset('backend/script/notice.js')}}"></script>
<script>
    CKEDITOR.replace("designation", {
    filebrowserUploadUrl: "ckeditor/",
    filebrowserUploadMethod: "form",
});
</script>
{!! JsValidator::formRequest('App\Http\Requests\NoticeRequest', '#form_edit'); !!}
@endsection