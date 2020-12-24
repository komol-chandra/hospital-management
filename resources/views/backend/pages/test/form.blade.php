
<div class="col-sm-12 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Details <span class="text-danger">*</span></label>
    {!! Form::textarea("details", null, ["class"=>"form-control e_details"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Lab Name <span class="text-danger">*</span></label>
    {!! Form::text("lab_name", null, ["class"=>"form-control e_lab_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Prize <span class="text-danger">*</span></label>
    {!! Form::number("prize", null, ["class"=>"form-control e_prize"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        {!! Form::radio("status",1 ,["class"=>"one"]) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,["class"=>"two"]) !!}
        {!! Form::label("inactive","Inactive") !!}
    </div>
</div>