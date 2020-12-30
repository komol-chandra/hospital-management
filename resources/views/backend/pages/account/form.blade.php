<div class="col-sm-12 form-group">
    <label>Account Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Account Type <span class="text-danger">*</span></label>
    {!! Form::selectAccountType('type_id',Null,['placeholder'=>"Select Account Type",'class'=>'form-control e_type_id','id'=>'type_id'] )!!}
</div>
<div class="col-sm-12 form-group">
    <label> Details</label>
    {!! Form::textarea("description", null, ["class"=>"form-control e_description"]) !!}
</div>

