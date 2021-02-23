<div class="col-sm-12 form-group">
    <label>Grand Total </label>
    <input type="number" class="form-control e_grand_total" readonly>
</div>
<div class="col-sm-12 form-group">
    <label>Old Paid </label>
    <input type="number" class="form-control e_paid" readonly>
</div>
<div class="col-sm-12 form-group">
    <label>Old Due</label>
    <input type="number" class="form-control e_due" readonly>
</div>
<div class="col-sm-12 form-group">
    <label>Now Pay<span class="text-danger">*</span></label>
    {!! Form::number("pay", null, ["class"=>"form-control"]) !!}
</div>
