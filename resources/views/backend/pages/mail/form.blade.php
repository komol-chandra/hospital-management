<div class="col-sm-6 form-group">
    <label>Send To<span class="text-danger">*</span></label>
    {!! Form::email("mail_to", null, ["placeholder"=>"damo@damo.com","class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Subject<span class="text-danger">*</span></label>
    {!! Form::text("subject",  null, ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Message<span class="text-danger">*</span></label>
    {!! Form::textarea("message",  null, ["class"=>"form-control","id"=>"compose textarea"]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Zip File</label>
    {!! Form::file("file",  null,["class"=>"form-control"]) !!}
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