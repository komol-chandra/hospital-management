
<div class="form-group">
    <label for="dept_name">Name <span class="validation-hints">*</span></label>
    {!! Form::text("name", $department['name'] ?? null, ["class"=>"form-control form-control-line"]) !!}
    
</div>

<div class="form-group">
    <label for="dept_description">Detail</label>
    {!! Form::textarea("description", $department['description'] ?? null, ["class"=>"form-control form-control-line", "rows" => 3]) !!}
</div>
<div class="form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
                @if( isset($department))
                {!! Form::radio("status",1, $department['status']==1 ? true : false) !!}
                {!! Form::label("active",'Active') !!}
                {!! Form::radio("status",2,$department['status']==2 ? true : false)!!}
                {!! Form::label("inactive",'Inactive') !!}
                @else
                {!! Form::radio("status",1 ) !!}
                {!! Form::label("active",'Active') !!}
                {!! Form::radio("status",2)!!}
                {!! Form::label("inactive",'Inactive') !!}
                @endif
    </div >
</div>
