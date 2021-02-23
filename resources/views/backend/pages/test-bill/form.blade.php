<div class="panel panel-default thumbnail">
    <div class="panel-heading no-print">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ url('/admin/test-bill') }}"> <i class="fa fa-list"></i>Test Bill List</a>
            {{-- <a class="btn btn-danger"  onclick="printDiv('printableArea')" tabindex="0"><span><i class="fa fa-print"></i></span></a> --}}
        </div>
    </div>
        
    <div class="panel-body" id="printableArea">
    <div class="row">
        <div class="col-sm-6">
            <div class="col-sm-12 form-group">
                <label>Date <span class="text-danger">*</span></label>
                <input type='date' name='date' class='form-control '>            
            </div>
            <div class="col-sm-12 form-group">
                <label>reference </label>
                {!! Form::text('reference',  null ,['placeholder' => 'name',"class"=>"form-control"]) !!}
            </div>
            <div class="col-sm-12 form-group">
                <label>Patient Mobile No. <span class="text-danger">*</span></label>
                <input type='text' name='mobile' class='form-control patientId'>
                <span class="icon"></span>              
            </div>
            <div class="col-sm-12 form-group">
                <label>Full Name <span class="text-danger">*</span></label>
                <input type='text'  class='form-control fullName' disabled readonly>
            </div>
            <div class="col-sm-12 form-group">
                <label>Address <span class="text-danger">*</span></label>
                <input type='text'  class='form-control address' disabled readonly>
            </div>
        </div>
        <div class="col-sm-6">
            <table class="table">
                <tbody>
                <tr>
                <td width="50%" class="text-right">
                <ul class="list-unstyled">
                <li><strong>{{ $settings->title }}</strong></li>
                <li>{{ $settings->address }}</li>
                <li>{{ $settings->email }}</li>
                <li>{{ $settings->contact }}</li>
                </ul>
                </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <table id="invoice" class="table table-striped">
        <thead>
        <tr class="bg-primary">
        <th>Test Name</th>
        <th>Description</th>
        <th width="50">Quantity</th>
        <th width="120">Price</th>
        <th width="120">Sub Total</th>
        <th width="160">Add / Remove</th>
        </tr>
        </thead>
    <div class="col-md-11 ">
        <table>
          <tr>
              <td>
                <select class='form-control' name='test_id[]' style='width: 170px;'>
                    <option selected hidden disabled>Select Test Name</option>
                    @foreach($tests as  $value)
                    <option value='{{ $value->id }}'>{{ $value->name }}</option>
                    @endforeach
                  </select>
              </td>
              <td>
                <input type='text' name='description[]' class='form-control' style='margin-left: 9px; width: 400px;' placeholder="Description">
              </td>
              <td>
                <input type='number' name='quantity[]' class='form-control quantity ' style='margin-left: 9px; width: 70px;'>
              </td>
              <td>
                <input type='number' name='price[]' class='form-control price ' style='margin-left: 9px; width: 70px;'>
              </td>
              <td>
                <input type='text' name='sub_total[]' class='form-control sub_total amount' style='margin-left: 9px; width: 170px;' readonly>
              </td>
              <td>
                <button class='btn btn-success btn-sm add_field' type="button" style='margin-left: 8px;'><i class="fa fa-plus-square"></i></button>
              </td>
          </tr>
        </table>
      <div class="input_field"></div>
  </div>
        </table>
        <table class="table table-striped">
            <tfoot>
                <tr class="bg-info">
                <td colspan="3"></td>
                <th class="text-right">Total</th>
                <th><input type="number" name="total" id="total" value="" class="form-control result" readonly="" required="" placeholder="Total" value="0.00"></th>
                <td></td>
                </tr>
                <tr>
                <th colspan="3" class="text-right">Vat</th>
                <td>
                <div class="input-group">
                <div class="input-group-addon">%</div>
                <input type="number" id="vatPercent" required="" autocomplete="off" class="form-control vatPercent" value="0">
                </div>
                </td>
                <td><input type="number" name="vat" id="vat" required="" autocomplete="off" class="vat form-control" placeholder="Vat" value="0.00"></td>
                <td></td>
                </tr>
                <tr>
                <th colspan="3" class="text-right">Discount</th>
                <td>
                <div class="input-group">
                <div class="input-group-addon">%</div>
                <input type="number" id="discountPercent" required="" autocomplete="off" class=" form-control discountPercent" value="0">
                </div>
                </td>
                <td><input type="number" name="discount" required="" autocomplete="off" id="discount" class="discount form-control" placeholder="Discount" value="0.00"></td>
                <td></td>
                </tr>
                <tr class="bg-success">
                <td colspan="3"></td>
                <th class="text-right">Grand Total</th>
                <th><input type="number" name="grand_total" readonly="" required="" autocomplete="off" id="grand_total" class="grand_total form-control" placeholder="Grand Total" value="0.00"></th>
                <td></td>
                </tr>
                <tr>
                <td colspan="3"></td>
                <th class="text-right">Paid</th>
                <td><input type="number" name="paid" id="paid" autocomplete="off" class="paid form-control" required="" placeholder="Paid" value="0.00"></td>
                <td></td>
                </tr>
                <tr class="bg-danger">
                <td colspan="3"></td>
                <th class="text-right">Due</th>
                <td><input type="number" name="due" id="due" autocomplete="off" class="due form-control" required="" placeholder="Due" value="0.00"></td>
                <td></td>
                </tr>
                <tr>
                <td colspan="3">
                <div class="form-group row">
                <label class="col-xs-3">Status</label>
                <div class="col-xs-9">
                <div class="form-check">
                <label class="radio-inline"><input type="radio" name="status" value="1" checked="">Active</label>
                <label class="radio-inline"><input type="radio" name="status" value="2">Inactive</label>
                </div>
                </div>
                </div>
                </td>
                </tr>
                </tfoot>
                
        </table>
    </div>
</div> 