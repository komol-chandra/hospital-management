<div class="col-sm-12 form-group">
    <label>code <span class="text-danger">*</span></label>
    {!! Form::text("code", null, ["class"=>"form-control"]) !!}
</div>

<div class="col-sm-12 form-group">
    <label>Date</label>
    {!! Form::date("date", null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Department <span class="text-danger">*</span></label>
    {!! Form::select('department_id',$departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctorTwo()","id"=>"department_two"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Doctor <span class="text-danger">*</span></label>
    <select name="doctor_id" class="select2 form-control custom-select doctor_two">
        <option selected disabled hidden>Select</option>
        
    </select>
    {{-- {!! Form::select('doctor',$doctors,  null , ['placeholder' => 'Select Doctor',"class"=>"form-control","id"=>"doctor"]) !!} --}}
</div>
<div class="col-sm-12 form-group">
    <label>Message</label>
    {!! Form::textarea("message", null,["class"=>"form-control"]) !!}
</div>