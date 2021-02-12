<div class="row">
    <div class="col-sm-4 form-group">
        <label>Name <span class="text-danger">*</span></label>
        {!! Form::text("name", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group ">
        <label>Email <span class="text-danger">*</span></label>
        {!! Form::email("email", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Mobile <span class="text-danger">*</span></label>
        {!! Form::number("mobile", null,["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Date</label>
        {!! Form::date("date", null, ["class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Department <span class="text-danger">*</span></label>
        {!! Form::select('department_id',$departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctor()","id"=>"department"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Doctor <span class="text-danger">*</span></label>
        <select name="doctor_id" id="doctor" class="select2 form-control custom-select doctor">
            <option selected disabled hidden>Select</option>
            
        </select>
        {{-- {!! Form::select('doctor',$doctors,  null , ['placeholder' => 'Select Doctor',"class"=>"form-control","id"=>"doctor"]) !!} --}}
    </div>
    <div class="col-sm-12 form-group">
        <label>Message</label>
        {!! Form::text("message", null,["class"=>"form-control"]) !!}
    </div>
</div>
{{-- <div class="col-sm-12 form-group">
    <label>Want to Register</label>
    {!! Form::checkbox("checkbox",null,["class"=>"form-control"]) !!}

</div> --}}
