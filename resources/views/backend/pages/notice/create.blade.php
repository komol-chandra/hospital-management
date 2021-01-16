
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create notice')
@section('header-title', 'Create notice')
@section('breadcrumb', 'Create notice')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-head">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/notice') }}"> <i class="fa fa-list"></i>notice List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/notice','method'=>'post','files'=>true,'id'=>'form_insert']) !!}
                        @include('backend.pages.notice.form')
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
<script src="{{asset('backend/script/notice.js')}}"></script>
<script>
    CKEDITOR.replace("designation", {
    filebrowserUploadUrl: "ckeditor/",
    filebrowserUploadMethod: "form",
});
</script>
{!! JsValidator::formRequest('App\Http\Requests\NoticeRequest', '#form_insert'); !!}

@endsection