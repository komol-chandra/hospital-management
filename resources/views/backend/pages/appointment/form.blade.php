<div class="col-sm-6 form-group">
    <label>Patient ID<span class="text-danger">*</span></label>
    {!! Form::text("code", null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Department <span class="text-danger">*</span></label>
    {!! Form::select('department', $departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctor()","id"=>"department"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Doctor Name <span class="text-danger">*</span></label>
    {!! Form::select('doctor', null , ['placeholder' => 'Select Doctor',"class"=>"form-control","id"=>"doctor"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Appointment Date<span class="text-danger">*</span></label>
    {!! Form::date("date", null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Serial No<span class="text-danger">*</span></label>
    {!! Form::number("phone", null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Problem</label>
    {!! Form::textarea("problem", null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
    </div>
</div>