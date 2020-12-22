<div class="col-sm-6 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name",$patient['name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Email <span class="text-danger">*</span></label>
    {!! Form::email("email", $patient['email'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Address</label>
    {!! Form::text("address",$patient['address'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Phone</label>
    {!! Form::number("phone", $patient['phone'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile",$patient['mobile'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Date of Birth <span class="text-danger">*</span></label>
    {!! Form::date("birthday", $patient['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Blood <span class="text-danger">*</span></label>
    {!! Form::select('blood_id', $bloods, $patient['blood_id'] ?? null ,['placeholder' => 'Select Department',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Gender <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($patient))
        {!! Form::radio("gender",1,$patient['gender'] ==1 ? true :false) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2,$patient['gender']==2 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3, $patient['gender']==3 ? true :false) !!}
        {!! Form::label("other","Other") !!}
        @else
        {!! Form::radio("gender",1) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3) !!}
        {!! Form::label("other","Other") !!}
        @endif
        
    </div>
</div>
<div class="col-sm-6 form-group">
    <label >Picture upload</label>

    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($patient))
        {!! Form::radio("status",1,$patient['status']==1 ? true : false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$patient['status']==2 ? true : false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
        @endif
    </div>
</div>
