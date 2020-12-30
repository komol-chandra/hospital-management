<div class="col-sm-4 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name",$data['name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Employee Type <span class="text-danger">*</span></label>
    {!! Form::select('roll_id', $getEmployeeRoll, $data['roll_id'] ?? null ,['placeholder' => 'Select Blood',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Blood <span class="text-danger">*</span></label>
    {!! Form::select('blood_id', $bloods, $data['blood_id'] ?? null ,['placeholder' => 'Select Blood',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Phone</label>
    {!! Form::number("phone", $data['phone'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile",$data['mobile'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Email <span class="text-danger">*</span></label>
    {!! Form::email("email", $data['email'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Address</label>
    {!! Form::text("address",$data['address'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-4 form-group">
    <label>Date of Birth <span class="text-danger">*</span></label>
    {!! Form::date("birthday", $data['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
</div>

<div class="col-sm-4 form-group">
    <label>Gender <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($data))
        {!! Form::radio("gender",1,$data['gender'] ==1 ? true :false) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2,$data['gender']==2 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3, $data['gender']==3 ? true :false) !!}
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
<div class="col-sm-4 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($data))
        {!! Form::radio("status",1,$data['status']==1 ? true : false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$data['status']==2 ? true : false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
        @endif
    </div>
</div>
<div class="col-sm-6 form-group">
    <label >Picture upload</label>
    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
</div>
