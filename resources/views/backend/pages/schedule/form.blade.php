<div class="col-sm-6 form-group">
    <label>Doctor Name <span class="text-danger">*</span></label>
    {!! Form::select('doctor',$doctors,$schedule['doctor'] ?? null ,['placeholder' => 'Select Doctor',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Available Days <span class="text-danger">*</span></label>
    {!! Form::select('day',$days, $schedule['day'] ?? null ,['placeholder' => 'Select Day',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Starting Time <span class="text-danger">*</span></label>
    {!! Form::time("starting",$schedule['starting'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Ending Time <span class="text-danger">*</span></label>
    {!! Form::time("ending",$schedule['ending'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Quantity of Patient<span class="text-danger">*</span></label>
    {!! Form::number("parpatient",$schedule['quantity'] ?? null,["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($schedule))
        {!! Form::radio("status",1,$schedule['status'] == 1 ? true :false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$schedule['status'] == 2 ? true :false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}            
        @endif
    </div>
</div>
