<div class="col-sm-12 form-group">
    <label> Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>

<div class="col-sm-12 form-group">
    <label>Phone<span class="text-danger">*</span></label>
    {!! Form::number("phone", null, ["class"=>"form-control e_phone"]) !!}
</div>

<div class="col-sm-12 form-group">
    <label> Address</label>
    {!! Form::textarea("address", null, ["class"=>"form-control e_address"]) !!}
</div>

<div class="col-sm-12 form-group custom-control custom-switch">
    <label>due able</label>
    <input type="checkbox" name="due_able" class="custom-control-input" value="1" id="due_able">
</div>

