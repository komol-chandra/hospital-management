<div class="col-sm-12 form-group">
    <label> Name <span class="text-danger">*</span></label>
    {!! Form::text("name", null, ["class"=>"form-control e_name"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Account name <span class="text-danger">*</span></label>
    {!! Form::selectAccount('account_id',Null,['placeholder'=>"Select Account Type",'class'=>'form-control e_account_id','id'=>'type_id'] )!!}
</div>
<div class="col-sm-12 form-group">
    <label> Pay To</label>
    {!! Form::text("pay_to", null, ["class"=>"form-control e_pay_to"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label> Details</label>
    {!! Form::textarea("description", null, ["class"=>"form-control e_description"]) !!}
</div>

