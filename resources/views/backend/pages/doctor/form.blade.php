{{-- Start user section --}}
<div class="col-sm-12"><h4 class="text-center">Basic Info  Data</h4></div><br>

<div class="col-sm-6 form-group">
    <label >Picture upload</label>
    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("full_name",$user['full_name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile",$user['mobile'] ??  null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Gender</label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($user['gender']))
        {!! Form::radio("gender",1,$user['gender'] == 1 ? true : false) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2,$user['gender'] == 2 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3,$user['gender'] == 3 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        @else
        {!! Form::radio("gender",1) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3) !!}
        {!! Form::label("female","Other") !!}
        @endif
        
    </div>
</div>

<div class="col-sm-6 form-group">
    <label>Date of Birth</label>
    {!! Form::date("birthday", $user['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Blood <span class="text-danger">*</span></label>
    {!! Form::select('blood_id', $bloods,$user['blood_id'] ?? null ,['placeholder' => 'Select Department',"class"=>"form-control"]) !!}
</div>



<div class="col-sm-12 form-group">
    <label>Address</label>
    {!! Form::text("address",$user['address'] ??  null,["class"=>"form-control"]) !!}
</div>

{{-- End the user secton --}}
{{-- End the doctor info secton --}}

<div class="col-sm-6 form-group">
    <label>Department <span class="text-danger">*</span></label>
    {!! Form::select('department_id', $departments , $doctor['department_id'] ?? null , ['placeholder' => 'Select Department',"class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Designation</label>
    {!! Form::text("designation", $doctor['designation'] ?? null, ["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Specialist</label>
    {!! Form::text("specialist", $doctor['specialist'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Phone</label>
    {!! Form::number("phone", $doctor['phone'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-12 form-group">
    <label>Biography</label>
    {!! Form::textarea("biography", $doctor['biography'] ?? null,["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>


<div class="col-sm-12 form-group">
    <label>Education/Degree</label>
    {!! Form::textarea("education", $doctor['education'] ?? null,["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>New Patient Consultation Fee</label>
    {!! Form::number("feeNew", $doctor['feeNew'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Fee Mounth</label>
    {!! Form::number("feeInMonth", $doctor['feeInMonth'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label> Fee Report</label>
    {!! Form::number("feeReport", $doctor['feeReport'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label> Doctor Salary</label>
    {!! Form::number("salary", $doctor['salary'] ?? null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($doctor))
        {!! Form::radio("status",1,$doctor['status'] == 1 ? true : false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$doctor['status'] == 2 ? true : false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
        @endif
    </div>
</div>
