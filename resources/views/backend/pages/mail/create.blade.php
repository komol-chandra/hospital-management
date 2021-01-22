
@extends('backend.layouts.app')
@section('content')
@section('title', '| Create mail')
@section('header-title', 'Create mail')
@section('breadcrumb', 'Create mail')

<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-head">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/mail') }}"> <i class="fa fa-list"></i>mail List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/mail','method'=>'post','files'=>true,'id'=>'form_insert']) !!}
                        @include('backend.pages.mail.form')
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
<script src="{{asset('backend/script/mail.js')}}"></script>
<script>
    CKEDITOR.replace("message", {
    filebrowserUploadUrl: "ckeditor/",
    filebrowserUploadMethod: "form",
});
</script>
{!! JsValidator::formRequest('App\Http\Requests\MailRequest', '#form_insert'); !!}

@endsection