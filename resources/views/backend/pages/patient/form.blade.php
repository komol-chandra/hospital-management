{{-- Start user section --}}
<div class="col-sm-12"><h4 class="text-center">Basic Info  Data</h4></div><br>

<div class="col-sm-6 form-group">
    <label >Picture upload</label>
    {!! Form::file("picture", null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("full_name",$patient['full_name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Mobile <span class="text-danger">*</span></label>
    {!! Form::number("mobile",$patient['mobile'] ??  null,["class"=>"form-control"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Gender</label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($patient['gender']))
        {!! Form::radio("gender",1,$patient['gender'] == 1 ? true : false) !!}
        {!! Form::label("male","Male") !!}
        {!! Form::radio("gender",2,$patient['gender'] == 2 ? true : false) !!}
        {!! Form::label("female","Female") !!}
        {!! Form::radio("gender",3,$patient['gender'] == 3 ? true : false) !!}
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
    {!! Form::date("birthday", $patient['birthday'] ?? null,["class"=>"form-control datepicker-input"]) !!}
</div>

<div class="col-sm-6 form-group">
    <label>Blood <span class="text-danger">*</span></label>
    {!! Form::select('blood_id', $bloods,$patient['blood_id'] ?? null ,['placeholder' => 'Select Blood',"class"=>"form-control"]) !!}
</div>



<div class="col-sm-12 form-group">
    <label>Address</label>
    {!! Form::text("address",$patient['address'] ??  null,["class"=>"form-control"]) !!}
</div>

{{-- End the user secton --}}

