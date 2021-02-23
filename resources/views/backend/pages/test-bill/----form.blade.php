<div class="col-sm-4 form-group">
    <label>Date <span class="text-danger">*</span></label>
    {!! Form::date('date',  null ,['placeholder' => 'Select Date',"class"=>"form-control today"]) !!}
</div>

<div class="col-sm-4 form-group">
    <label>reference </label>
    {!! Form::text('reference',  null ,['placeholder' => 'name',"class"=>"form-control"]) !!}
</div>

<div class="col-sm-4 form-group">
    <label>Patients Mobile<span class="text-danger">*</span></label>
    {!! Form::select('patient_id', $patients, null ,['placeholder' => 'Select Mobile',"class"=>"form-control"]) !!}
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