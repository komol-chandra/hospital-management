<div class="row">
    <div class="col-sm-4 form-group">
        <label> Matach mobile<span class="text-danger">*</span></label>
        {!! Form::text("mobile", null, ["class"=>"form-control patientId"]) !!}
        <span class="icon"></span>  
    </div>
    <div class="col-sm-4 form-group">
        <label>Name</label>
        <input type='text'  class='form-control fullName' disabled readonly>
    </div>
    <div class="col-sm-4 form-group">
        <label>Email</label>
        <input type='text'  class='form-control email' disabled readonly>
    </div>
    <div class="col-sm-4 form-group">
        <label>Department <span class="text-danger">*</span></label>
        {!! Form::select('department_id',$departments , null , ['placeholder' => 'Select Department',"class"=>"form-control","onchange"=>"getDoctorTwo()","id"=>"department_two"]) !!}
    </div>
    <div class="col-sm-4 form-group">
        <label>Doctor <span class="text-danger">*</span></label>
        <select name="doctor_id" class="select2 form-control custom-select doctor_two" id="doctor_id">
            <option selected disabled hidden>Select</option>
            
        </select>
        {{-- {!! Form::select('doctor',$doctors,  null , ['placeholder' => 'Select Doctor',"class"=>"form-control","id"=>"doctor"]) !!} --}}
    </div>
    <div class="col-sm-4 form-group">
        <label>Date</label>
        {!! Form::date("date", null, ["class"=>"form-control date"]) !!}
    </div>
    <div class="col-sm-12">
        <span class="appointment"></span>
    </div>
    
    <div class="col-sm-12 form-group">
        <label>Message</label>
        {!! Form::text("message", null,["class"=>"form-control"]) !!}
    </div>
</div>