<div class="col-sm-4 form-group">
    <label>Expense Type <span class="text-danger">*</span></label>
    {!! Form::select('expense_id',$expenseType,  null , ['placeholder' => 'Select Type',"class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Expense Date <span class="text-danger">*</span></label>
    {!! Form::date('date',  null , ["class"=>"form-control"]) !!}
</div>
<div class="col-sm-4 form-group">
    <label>Amount <span class="text-danger">*</span></label>
    {!! Form::number('amount',  null , ['placeholder' => 'enter the amount',"class"=>"form-control"]) !!}
</div>

<div class="col-sm-12 form-group">
    <label>Detials</label>
    {!! Form::text("details",  null,["class"=>"form-control"]) !!}
</div>