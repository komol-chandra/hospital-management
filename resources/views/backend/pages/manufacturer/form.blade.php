
<div class="col-sm-12 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile", null, ["class"=>"form-control e_mobile"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Email <span class="text-danger">*</span></label>
    {!! Form::email("email", null, ["class"=>"form-control e_email"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Address</label>
    {!! Form::textarea("address", null, ["class"=>"form-control e_address"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Details</label>
    {!! Form::textarea("details", null, ["class"=>"form-control e_details"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> picture</label>
    {!! Form::file("picture", null, ["class"=>"form-control e_picture"]) !!}
</div>