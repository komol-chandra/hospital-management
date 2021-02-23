<div class="col-sm-12"><h4 class="text-center">User Table Data</h4></div>
<div class="col-sm-6 form-group">
    <label>User Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Email <span class="text-danger">*</span></label>
    {!! Form::email("email", null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>New Password<span class="text-danger">*</span></label>
    {!! Form::text("password", null, ["class"=>"form-control"]) !!}
</div>