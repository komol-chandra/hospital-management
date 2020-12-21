<div class="col-sm-6 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name", $doctor['name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Email <span class="text-danger">*</span></label>
    {!! Form::email("email", $doctor['email'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Designation</label>
    {!! Form::text("designation", $doctor['designation'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Department <span class="text-danger">*</span></label>
    {!! Form::select('department', $departments , $doctor['department'] ?? null , ['placeholder' => 'Select Department',"class"=>"form-control"]) !!}
    
</div>
<div class="col-sm-12 form-group">
    <label>Address</label>
    {!! Form::text("address", $doctor['address'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Phone</label>
    {!! Form::number("phone", $doctor['phone'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile", $doctor['mobile'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Biography</label>
    {!! Form::textarea("biography", $doctor['biography'] ?? null,["class"=>"form-control","id"=>"editor"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Specialist</label>
    {!! Form::text("specialist", $doctor['specialist'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Date of Birth <span class="text-danger">*</span></label>
    {!! Form::date("birthday", $doctor['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Gender <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($doctor))
        {!! Form::radio("gender",1,$doctor['gender'] == 1 ? true : false) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2,$doctor['gender'] == 2 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        @else
        {!! Form::radio("gender",1) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2) !!}
        {!! Form::label("female","Female") !!}
        @endif
        
    </div>
</div>
<div class="col-sm-6 form-group">
    <label>Blood <span class="text-danger">*</span></label>
    {!! Form::select('blood', $bloods, $doctor['blood'] ?? null ,['placeholder' => 'Select Department',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Education/Degree</label>
    {!! Form::textarea("education", $doctor['education'] ?? null,["class"=>"form-control","id"=>"editor2"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label >Picture upload</label>

    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
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