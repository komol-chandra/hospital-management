<div class="col-sm-12 form-group">
    <label>User Name <span class="text-danger">*</span></label>
    {!! Form::text("",  null, ["class"=>"form-control e_name","disabled"=>"disabled"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Email<span class="text-danger">*</span></label>
    {!! Form::email("", null, ["class"=>"form-control e_email","disabled"=>"disabled"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Role<span class="text-danger">*</span></label>
    {!! Form::selectRole('role', Null,['placeholder'=>"Select Role",'class'=>'form-control e_id','id'=>'type_id'] )!!}
</div>