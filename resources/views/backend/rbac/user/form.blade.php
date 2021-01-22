<div class="col-sm-12 form-group">
    <label>User Name <span class="text-danger">*</span></label>
    {!! Form::text("name",  null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Email<span class="text-danger">*</span></label>
    {!! Form::email("email", null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Password<span class="text-danger">*</span></label>
    {!! Form::password("password", null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label >Picture upload</label>
    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
</div>