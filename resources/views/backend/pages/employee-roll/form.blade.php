<div class="col-sm-12 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Details</label>
    {!! Form::textarea("description", null, ["class"=>"form-control e_description"]) !!}
</div>