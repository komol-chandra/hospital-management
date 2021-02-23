<div class="col-sm-4 form-group">
    <label>Date <span class="text-danger">*</span></label>
    {!! Form::date('date',  null ,['placeholder' => 'Select Date',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Doctors Name<span class="text-danger">*</span></label>
    {!! Form::select('doctor_id',$doctors, null ,['placeholder' => 'Select Doctor',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Patients Name<span class="text-danger">*</span></label>
    {!! Form::select('patient_id',$patients, null ,['placeholder' => 'Select Patient',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>History<span class="text-danger">*</span></label>
    {!! Form::textarea("history", null, ["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Note<span class="text-danger">*</span></label>
    {!! Form::textarea("note", null, ["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>
<div class="row">
    <div class="col-sm-2 form-group">
        <label>Medicine Name<span class="text-danger">*</span></label>
        {!! Form::text('medicine[]',  null ,['placeholder' => 'name',"class"=>"form-control"]) !!}
        {{-- {!! Form::select('medicine_id[]',$medicines, null ,['placeholder' => 'Select Medicine',"class"=>"form-control"]) !!} --}}
    </div>
    <div class="col-sm-2 form-group">
        <label>Duration <span class="text-danger">*</span></label>
        {!! Form::text('duration[]',  null ,['placeholder' => '100 mg',"class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-2 form-group">
        <label>sequence <span class="text-danger">*</span></label>
        {!! Form::text('sequence[]',  null ,['placeholder' => '1+1+1',"class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-2 form-group">
        <label>Day <span class="text-danger">*</span></label>
        {!! Form::text('day[]',  null ,['placeholder' => '7 Day',"class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-2 form-group">
        <label>Instruction <span class="text-danger">*</span></label>
        {!! Form::text('instruction[]',  null ,['placeholder' => 'After Food',"class"=>"form-control"]) !!}
    </div>
    <div class="col-sm-2 form-group">
        <button style="margin-top: 25px;" type="button" class="btn btn-success btn-sm add_field"><i class="fa fa-plus-square"></i></button>
    </div>
    
</div>
<div class="input_field"></div>