@extends('backend.layouts.app')
@section('content')
@section('title', '| Settings')
@section('header-title', 'Settings')
@section('breadcrumb', 'Settings')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    {{-- <a class="btn btn-primary" href="{{ url('/admin/patient') }}"> <i class="fa fa-list"></i>Patient List</a>   --}}
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/setting/'.$data['id'].'','method'=>'put','files'=>true]) !!}
                    {!! Form::hidden('id',$data['id']) !!}
                    <div class="col-sm-6 form-group">
                        <label>App title <span class="text-danger">*</span></label>
                        {!! Form::text("title",$data['title'] ?? null, ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        {!! Form::email("email", $data['email'] ?? null, ["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-12 form-group">
                        <label>Address<span class="text-danger">*</span></label>
                        {!! Form::text("address",$data['address'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>contact<span class="text-danger">*</span></label>
                        {!! Form::text("contact", $data['contact'] ?? null,["class"=>"form-control"]) !!}
                    </div>

                    <div class="col-sm-6 form-group">
                        <label>facebook</label>
                        {!! Form::text("facebook", $data['facebook'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>linkedin</label>
                        {!! Form::text("linkedin", $data['linkedin'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>twitter</label>
                        {!! Form::text("twitter", $data['twitter'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>google</label>
                        {!! Form::text("google", $data['google'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>youtube</label>
                        {!! Form::text("youtube", $data['youtube'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>instagram</label>
                        {!! Form::text("instagram", $data['instagram'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>footer text<span class="text-danger">*</span></label>
                        {!! Form::text("footer_text", $data['footer_text'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label>year<span class="text-danger">*</span></label>
                        {!! Form::text("footer_year", $data['footer_year'] ?? null,["class"=>"form-control"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label >favicon upload</label>
                        <img name="favicon" id='favicon' src="/{{ $data->favicon ?? 'backend/files/favicon.ico' }}" alt="image" class='img-responsive '><br><br>
                        {!! Form::file("favicon", null,["class"=>"form-control","onchange"=>"readURL(this);"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label >small logo upload</label>
                        <img name="small_logo" id='smallLogo' src="/{{ $data->small_logo ?? 'backend/files/mini-logo.png' }}" alt="image" class='img-responsive  smallLogo'><br><br>
                        {!! Form::file("small_logo", null,["class"=>"form-control smallLogo","onchange"=>"readURL2(this);"]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label >logo upload</label>
                        <img name="logo" id='smallLogo' src="/{{ $data->logo ?? 'backend/files/logo.png' }}" alt="image" class='img-responsive smallLogo'><br><br>

                        {!! Form::file("logo", null,["class"=>"form-control "]) !!}
                    </div>
                    <div class="col-sm-6 form-group">
                        <label >white logo upload</label>
                        <img name="white_logo" id='smallLogo' src="/{{ $data->white_logo ?? 'backend/files/logo.png' }}" alt="image" class='img-responsive  smallLogo'><br><br>

                        {!! Form::file("white_logo", null,["class"=>"form-control"]) !!}
                    </div>
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
<script type="text/javascript">
function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#favicon')
                .attr('src', e.target.result)
                .width(500)
                .height(300);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('.smallLogo')
                .attr('src', e.target.result)
                .width(500)
                .height(300);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection