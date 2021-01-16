<div class="col-sm-12 form-group">
    <label>Title <span class="text-danger">*</span></label>
    {!! Form::text("name",$data['name'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Starting Date</label>
    {!! Form::date("start_date",$data['start_date'] ??  null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Ending Date</label>
    {!! Form::date("end_date", $data['end_date'] ?? null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Description</label>
    {!! Form::textarea("designation",$data['designation'] ??  null,["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($data['status']))
        {!! Form::radio("status",1,$data['status'] == 1 ? true : false) !!}
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