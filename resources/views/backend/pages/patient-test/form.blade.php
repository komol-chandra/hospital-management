<div class="col-sm-6 form-group">
    <label>Test Type <span class="text-danger">*</span></label>
    {!! Form::select('test_id',$test, $data['test_id'] ??  null , ['placeholder' => 'Select Type',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Doctor Name <span class="text-danger">*</span></label>
    {!! Form::select('doctor_id',$doctor, $data['doctor_id'] ??  null , ['placeholder' => 'Select Doctor',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Patient Name <span class="text-danger">*</span></label>
    {!! Form::select('patient_id',$patient,$data['patient_id'] ??  null , ['placeholder' => 'Select Patient',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Detials</label>
    {!! Form::textarea("details",$data['details'] ??  null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($data['status']))
        {!! Form::radio("status",1,$data['status'] == 1 ? true: false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$data['status'] == 2 ? true : false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
        @endif
    </div>
</div>