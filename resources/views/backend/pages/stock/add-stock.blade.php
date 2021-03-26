@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Stock')
@section('header-title', 'Create Stock')
@section('breadcrumb', 'Create Stock')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="btn-group">
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-8">
                    <table class="table table-bordered" >
                        <thead >
                            <th>QTY</th>
                            <th>Batch</th>
                            <th>Product</th>
                            <th>Purchase</th>
                            <th>Sale</th>
                            <th>Exp Date</th>
                            <th>Subtotal</th>
                            <th><i class="fa fa-trash"></i></th>
                        </thead>
                        <tbody id="productLoop">
                            
                         </tbody>
                    </table>
                    <form action="{{url('/admin/stock')}}" method="post" enctype="multipart/form-data" id="form_insert">@csrf
                        <div class="custom-div">
                            <table class="table table-bordered mt-4" id="dynamic_field">
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                        <table class="table table-striped">
                            <tfoot>
                                <tr class="bg-info">
                                <td colspan="3"></td>
                                <th class="text-right">Total</th>
                                <th><input type="number" name="total" id="total" class="form-control  total" readonly="" required="" placeholder="Total" value="0.00"></th>
                                <td></td>
                                </tr>
                                <tr class="bg-danger">
                                    <td colspan="3"></td>
                                    <th class="text-right">Other Expence</th>
                                    <th><input type="number" name="other_amount" id="other_amount"  class="form-control  other_amount" required="" placeholder="other amount" value="0"></th>
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
                                <td><input type="number" name="vat_amount" id="vat" required="" autocomplete="off" class="vat form-control" placeholder="Vat" value="0.00"></td>
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
                                <td><input type="number" name="discounted_amount" required="" autocomplete="off" id="discount" class="discount form-control" placeholder="Discount" value="0.00"></td>
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
                                <td><input type="number" name="pay" id="paid" autocomplete="off" class="paid form-control" required="" placeholder="Paid" value="0.00"></td>
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
                                <td><button type="submit" class="btn btn-success">Save</button></td>
                                </div>
                                </td>
                                </tr>
                                </tfoot>
                                
                        </table>
                    </form>
                </div>

                <div class="col-sm-4">
                    <div class="col-sm-12 ">
                        <div class="col-sm-12 panel panel-bd">
                            {!! Form::open(['url' => '#','method'=>'post',"id"=>"form_search"]) !!}
                            <div class="col-sm-6 form-group">
                                <label>Type Name <span class="text-danger">*</span></label>
                                <select id="type_id" class="form-control" name="type_id" onchange="getSearch()">
                                    <option value=""> select</option>
                                    @foreach($type as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="col-sm-6 form-group">
                                <label>Generic Name <span class="text-danger">*</span></label>
                                <select id="generic_id" class="form-control" name="generic_id" onchange="getSearch()">
                                    <option value=""> select</option>
                                    @foreach($generic as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-12 form-group">
                                <input type="text" name="search" class="form-control" id="search" placeholder="search medacine name,sku" onchange="getSearch()">
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <div class="col-sm-12" id="div">
                            
                        </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function getSearch(){
        let type_id = $("#type_id").val();
        let generic_id = $("#generic_id").val();
        let search = $("#search").val();
        page_link = `/admin/stockSearch?type_id=${type_id ? type_id : ""}&generic_id=${generic_id ? generic_id : ""}&search=${search ? search : ""}`;

        $.ajax({
            url:page_link,
            type:"get",
            dataType:"json",
            async:false,
            success:function(response){
                let html_data = "";
                response.forEach((value,index) => {
                    html_data += `<div class='col-sm-6 panel panel-bd' id='product-div' onclick='getProduct(${JSON.stringify(value)})'>
                            <div class='card' style="width: 18rem;">
                            <img class='card-img-top' src="/{{ $value->picture ?? 'backend/files/no-img.png' }}" style="height: 50px; width: 50px;"  alt='Card image'>
                            <div class='card-body'>
                            <h5 class='card-title'>${value.name}</h5>
                            </div>
                            </div>
                            </div>`;
                });
                $("#div").html(html_data);
            }
        });
    }
    var medicineArray = [];
    function getProduct(value){
        var newMedicine = {
            medicine_id: value.id,
            medicine_name: value.name,
            qty: "",
            batch: "",
            purchase_rate: "",
            sale_rate: "",
            exp_date: "",
            sub_total: "",
        };
        medicineArray.push(newMedicine);
        loop();
    }
    // var loop_html = "";
    function loop(){
        let loop_html = "";
        medicineArray.forEach((element,index) => {
             loop_html += `<tr>
                        <td class="text-center" style="min-width:5rem; width:12%;">
                            <input type="number"  name="qty[]" min="0" value="${element.qty}" id="qty_${index}" class="qty form-control form-control-sm" onChange="getQty(${index})">
                        </td>
                        <td class="text-center" style="min-width:5rem; width:12%;">
                            <input type="number" min="0" name="batch[]" value="${element.batch}" id="batch_${index}" class="form-control batch form-control-sm" onChange="getBatch(${index})">
                        </td>
                        <td class="text-center" style="min-width:5rem; width:12%;">
                            <p >${element.medicine_name}</p>
                            <input type="hidden" value="${element.id}" name="medicine_id[]">
                        </td>
                        <td class="text-center" style="min-width:5rem; width:12%;">
                            <input type="number" name="purchase_rate[]" value="${element.purchase_rate}" id="purchase_rate_${index}" class="form-control purchase_rate form-control-sm" onChange="getPurchase(${index})">
                        </td>
                        <td class="text-center" style="max-width: 4rem; width:12%;">
                            <input type="number" name="sale_rate[]" value="${element.sale_rate}" id="sale_rate_${index}" class="form-control sale_rate form-control-sm" onChange="getSale(${index})">
                        </td>
                        <td class="text-center" style="max-width: 6rem; width:2rem;">
                            <input type="date" name="exp_date[]" id="exp_date_${index}" value="${element.exp_date}" class="exp_date form-control" onChange="getExpDate(${index})">
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:2rem;">
                            <input type="number" class="form-control sub_total"  readonly id="sub_total_${index}" value="${element.sub_total}"  name="sub_total[]" >
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:2rem;">
                            <button class='btn btn-danger btn-sm remove_field' onclick='getRemove(${index})' style='margin-left: 8px;'><i class='fa fa-trash'></i></button>
                        </td>
                    </tr>`; 
        });
        $("#productLoop").html(loop_html);
    }

    function getQty(index){
        let qty = $("#qty_"+index).val();
        medicineArray[index].qty=qty;
        medicineArray[index].sub_total = (medicineArray[index].qty * medicineArray[index].purchase_rate);
        loop();
        fnAlltotal();
    }
    
    function getBatch(index){
        let batch = $("#batch_"+index).val();
        medicineArray[index].batch=batch;
        loop();
    }

    function getPurchase(index){
        let purchase_rate = $("#purchase_rate_"+index).val();
        medicineArray[index].purchase_rate=purchase_rate;
        medicineArray[index].sub_total = (medicineArray[index].qty * medicineArray[index].purchase_rate);
        loop();
        fnAlltotal();

    }

    function getSale(index){
        let sale_rate = $("#sale_rate_"+index).val();
        medicineArray[index].sale_rate=sale_rate;
        loop();
    }

    function getExpDate(index){
        let exp_date = $("#exp_date_"+index).val();
        medicineArray[index].exp_date=exp_date;
        loop();
    }

    function getSubTotal(index){
        let sub_total = $("#sub_total_"+index).val();
        medicineArray[index].sub_total=sub_total;
        loop();
    }

    function getRemove(index){
        medicineArray.splice(index,1);
        loop();
    }

    function fnAlltotal() {
        let total = 0;
        $(".sub_total").each(function (i, e) {
            total += parseInt($(this).val() || 0);
        });
        console.log(total);
        $(".total").val(total);
        $(".grand_total").val(total);
        $(".due").val(total);
    }

    $(document).on("change", ".other_amount", function () {
        let other_amount = $(this).val();
        let total = $(".total").val();
        let grandTotal = parseInt(other_amount) + parseInt(total);
        $(".grand_total").val(grandTotal);
        $(".due").val(grandTotal);
    });

    $(document).on("change", ".vatPercent", function () {
        let vatPercent = $(this).val();
        let result = $(".total").val();
        let other_amount = $(".other_amount").val();
        if(other_amount == 0){
            console.log("zero");
            vat = parseInt((result * vatPercent) / 100);
        }else{
            console.log("zero not");
            let sumResult = parseInt(result) + parseInt(other_amount);
            vat = parseInt((sumResult * vatPercent) / 100);
        }
        let total = $(".total").val();
        let grandTotal = parseInt(vat) + parseInt(total) + parseInt(other_amount);
        console.log(grandTotal);
        $(".grand_total").val(grandTotal);
        $(".vat").val(vat);
        $(".due").val(grandTotal);
    });

    $(document).on("change", ".discountPercent", function () {
        let discountPercent = $(this).val();
        $(".discount").val(discountPercent);
        let discountAmount = $(".discount").val();
        let total = $(".grand_total").val();
        let discount = parseInt((total * discountAmount) / 100);
        $(".discount").val(discount);
        let grandTotal = parseInt(total) - parseInt(discount);
        $(".grand_total").val(grandTotal);
        $(".due").val(grandTotal);
    });
    $(document).on("change", ".paid", function () {
        let paid = $(this).val();
        let total = $(".grand_total").val();
        let due = parseInt(total) - parseInt(paid);
        $(".due").val(due);
    });


    $(document).ready(function () {
        $(document).on("submit", "#form_insert", function (e) {
            e.preventDefault();
            let data = $(this).serializeArray();
            // console.log();
            data[data.length]={name:"medicines",value:JSON.stringify(medicineArray)};
            console.log(data);
            $.ajax({
                data: data,
                url: "/admin/stock",
                type: "post",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    iziToast.success({
                        title: response.title,
                        message: response.message,
                        position: "topRight",
                    });
                    $(".close").click();
                    $("#form_insert").trigger("reset");
                },
                error: function (errorMess) {
                    // iziToast.error({
                    //     title: error.title,
                    //     message: error.message,
                    //     position: "topRight",
                    // });
                    // let errorList = errorMess.responseJSON;
                    // console.log(errorList);
                    // errorList.forEach((element) => {
                    //     console.log(element);
                    // });
                },
            });
        });
    });
</script>
{{-- {!! JsValidator::formRequest('App\Http\Requests\ScheduleRequest', '#form_insert'); !!} --}}
@endsection