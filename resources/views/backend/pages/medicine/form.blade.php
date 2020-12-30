
<div class="col-sm-6 form-group">
    <label>Name <span class="text-danger">*</span></label>
    {!! Form::text("name", $data['name'] ?? null, ['placeholder' => 'Enter Medicine Name',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Medicine type name<span class="text-danger">*</span></label>
    {!! Form::select('type_id', $getMedicineType , $data['type_id'] ?? null , ['placeholder' => 'Select Medicine Type',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Generic name<span class="text-danger">*</span></label>
    {!! Form::select('generic_id', $getGeneric , $data['generic_id'] ?? null , ['placeholder' => 'Select Generic',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Manufacturer name<span class="text-danger">*</span></label>
    {!! Form::select('manufacturer_id', $getManufacturer ,$data['manufacturer_id'] ??  null , ['placeholder' => 'Select Manufacturer',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Tax <span class="text-danger">*</span></label>
    {!! Form::number("tax",$data['tax'] ?? null, ["class"=>"form-control",'placeholder' => 'Enter Medicine Tax',]) !!}
</div>
<div class="col-sm-12 form-group">
    <label>Details <span class="text-danger">*</span></label>
    {!! Form::textarea("details",$data['details'] ?? null, ["class"=>"form-control",'placeholder' => 'Enter Medicine details',]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Per Box Medicine<span class="text-danger">*</span></label>
    {!! Form::number("per_box", $data['per_box'] ??null, ["class"=>"form-control",'placeholder' => 'Enter Medicine Tax',]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Medicine price<span class="text-danger">*</span></label>
    {!! Form::number("price",$data['price'] ?? null, ["class"=>"form-control",'placeholder' => 'Enter Medicine price',]) !!}
</div>
<div class="col-sm-6 form-group">
    <label> picture</label>
    {{-- <img style="height: 200px; width: 200px; border-radius: 100px;" id='picture'  alt="image" src="/{{ $data['picture'] ?? 'backend/files/profile.jpg' }}" class='img-responsive picture'> --}}
    {!! Form::file("picture",  null, ["class"=>"form-control e_picture","id"=>"picture","onchange"=>"readURL(this)"]) !!}
</div>
<div class="col-sm-6 form-group">
    <label>Status <span class="text-danger">*</span></label>
    <div class="form-check">
        <label class="radio-inline"></label>
        @if(isset($data ['status']))
        {!! Form::radio("status",1,$data['status'] == 1 ? true:false) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2,$data['status'] == 2 ? true:false) !!}
        {!! Form::label("inactive","Inactive") !!}
        @else
        {!! Form::radio("status",1) !!}
        {!! Form::label("active","Active") !!}
        {!! Form::radio("status",2) !!}
        {!! Form::label("inactive","Inactive") !!}
        @endif
    </div>
</div>
