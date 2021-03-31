@extends('backend.layouts.app')
@section('content')
@section('title', '| Create Sale')
@section('header-title', 'Create Sale')
@section('breadcrumb', 'Create Sale')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="btn-group">
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-5">
                    <div class="col-sm-12 ">
                        <div class="col-sm-12 panel panel-bd">
                            <form action="#" method="get">
                                <div class="col-sm-6 form-group">
                                    <select id="type_id" class="form-control type_id" name="type_id"
                                            onchange="getSearch()">
                                        <option value=""> Select Type</option>
                                        @foreach($type as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-sm-6 form-group">
                                    <select id="generic_id" class="form-control generic_id" name="generic_id"
                                            onchange="getSearch()">
                                        <option value=""> Select Generic</option>
                                        @foreach($generic as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-12 form-group">
                                    <input type="text" name="search" class="form-control search" id="search"
                                           placeholder="search medacine name,sku" onchange="getSearch()">
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-12 div" id="div">

                        </div>

                    </div>
                </div>

                <div class="col-sm-7">
                    <table class="table table-bordered">
                        <thead>
                        <th>Batch</th>
                        <th>Quantity</th>
                        <th>Medicine Name</th>
                        <th> Price</th>
                        <th>Subtotal</th>
                        <th><i class="fa fa-trash"></i></th>
                        </thead>
                        <tbody id="productLoop">

                        </tbody>
                    </table>
                    <form action="{{url('/admin/stock')}}" method="post" enctype="multipart/form-data"
                          id="form_insert">@csrf
                        <div class="custom-div">
                            <table class="table table-bordered mt-4" id="dynamic_field">
                                <tbody id="loop-tr">

                                </tbody>
                            </table>
                        </div>
                        <table class="table table-striped">
                            <tfoot>
                            <tr class="bg-success">
                                <td colspan="3"></td>
                                <th class="text-right">Customer Name</th>
                                <th><select id="customer_id" class="form-control customer_id" name="customer_id"
                                            onchange="getSearch()">
                                        <option value=""> Customer Type</option>
                                        @foreach($customers as $data)
                                            <option value="{{ $data->id }}">{{ $data->phone }}({{ $data->name }})
                                            </option>
                                        @endforeach
                                    </select></th>
                                <td></td>
                            </tr>

                            <tr class="bg-info">
                                <td colspan="3"></td>
                                <th class="text-right">Total</th>
                                <th><input type="number" name="total" id="total" class="form-control  total" readonly=""
                                           required="" placeholder="Total" value="0.00"></th>
                                <td></td>
                            </tr>

                            <tr>
                                <th colspan="3" class="text-right">Discount</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"></div>
                                        <input type="number" id="discountPercent" required="" autocomplete="off"
                                               class=" form-control discountPercent" value="0">
                                    </div>
                                </td>
                                <td>
                                    <select name="discunt_select" id="discunt_select" class="form-control">
                                        <option value="flate">flate</option>
                                        <option value="percent">percent</option>
                                    </select>

                                <td></td>
                            </tr>


                            <tr class="bg-danger">
                                <td colspan="3"></td>
                                <th class="text-right">Discunted Amount</th>
                                <th><input type="number" name="discounted_amount" required="" autocomplete="off"
                                           id="discount" class="discount form-control" placeholder="Discount"
                                           value="0.00"></th>
                                <td></td>
                            </tr>

                            <tr class="bg-success">
                                <td colspan="3"></td>
                                <th class="text-right">Grand Total</th>
                                <th><input type="number" name="grand_total" readonly="" required="" autocomplete="off"
                                           id="grand_total" class="grand_total form-control" placeholder="Grand Total"
                                           value="0.00"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <th class="text-right">Paid</th>
                                <td><input type="number" name="pay" id="paid" autocomplete="off"
                                           class="paid form-control" required="" placeholder="Paid" value="0.00"></td>
                                <td></td>
                            </tr>
                            <tr class="bg-danger">
                                <td colspan="3"></td>
                                <th class="text-right">Due</th>
                                <td><input type="number" name="due" id="due" autocomplete="off" class="due form-control"
                                           required="" placeholder="Due" value="0.00"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="form-group row">
                                <td>
                                    <button type="submit" class="btn btn-success">Save</button>
                                </td>
                </div>
                </td>
                </tr>
                </tfoot>
                </table>
                </form>
            </div>


        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.type_id').select2();
            $('.generic_id').select2();
            $('.customer_id').select2();

        });

        function getSearch() {
            let type_id = $("#type_id").val();
            let generic_id = $("#generic_id").val();
            let search = $("#search").val();
            product_search = `/admin/saleSearch?type_id=${type_id ? type_id : ""}&generic_id=${generic_id ? generic_id : ""}&search=${search ? search : ""}`;
            $.ajax({
                url: product_search,
                type: "get",
                dataType: "json",
                async: false,
                success: function (response) {
                    console.log(response);
                    let html_data = "";
                    response.forEach(element => {
                        html_data += `<div class='col-sm-4 panel panel-bd' id='product-div' onclick='getProduct(${JSON.stringify(element)})'>
                            <div class='card' style="width: 18rem;">
                            <img class='card-img-top' src="/${element.picture ? element.picture : 'backend/files/no-img.png'}" style="height: 50px; width: 50px;"  alt='Card image'>
                            <div class='card-body'>
                            <h5 class='card-title'>${element.name}</h5>
                            </div>
                            </div>
                            </div>`;
                    });
                    $("#div").html(html_data);
                }
            });
        }

        var medicineArray = [];

        function getProduct(value) {
            let id = value.id;
            $.ajax({
                url: `/admin/getBatch/${id}`,
                type: `get`,
                dataType: "json",
                success: function (response) {
                    // console.log(response);

                    var batch_data = response;

                    var newMedicine = {

                        medicine_id: value.id,
                        medicine_name: value.name,
                        // qty: batch_qty,
                        batch_data: batch_data,
                        qty: "",
                        batch: "",
                        price: "",
                        sub_total: "",
                    };
                    // console.log(newMedicine);
                    medicineArray.push(newMedicine);
                    loop();


                    // batch_data.forEach((value,index)=>{
                    //     // console.log(value);
                    //     var batch_name = (value.batch);
                    //     var batch_qty = (value.qty);
                    //     var price = (value.sale_rate);
                    //     console.log(price);
                    // });

                }
            })


        }

        function loop() {
            let loop_html = "";
            medicineArray.forEach((value, index) => {
                console.log(value)
                loop_html += `<tr>
                        <td class="text-center" style="max-width: 1rem; width:1rem;">
                            <select name="" id="select_batch" class="form-control"   onChange="getBatch(${index})">`
                value.forEach((value, index) => {
                    // console.log(element)
                    // <option value="1">1</option>

                });


                loop_html += `</select>
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:1rem;">
                            <input type="number" id="qty_${index}" name="qty[]" min="0" value=""  class="qty form-control form-control-sm" onChange="getQty(${index})">
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:1rem;">
                            <p >${value.medicine_name}</p>
                            <input type="hidden"  name="medicine_id[]" value="${value.id}">
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:1rem;">
                            <input type="number" name="price[]" readonly  class="form-control price form-control-sm" value="" >
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:1rem;">
                            <input type="number" class="form-control sub_total" readonly name="sub_total[]" >
                        </td>
                        <td class="text-center" style="max-width: 1rem; width:12%;">
                            <button class='btn btn-danger btn-sm remove_field' onclick="getRemove(${index})" style='margin-left: 8px;'><i class='fa fa-trash'></i></button>
                        </td>
                    </tr>`;
            });
            $("#productLoop").html(loop_html);
        }

        function getRemove(index) {
            medicineArray.splice(index, 1);
            loop();
        }

        function getQty(index) {
            let qty = $("#qty_" + index).val();
            medicineArray[index].qty = qty;
            loop();
        }
    </script>
    {{-- {!! JsValidator::formRequest('App\Http\Requests\ScheduleRequest', '#form_insert'); !!} --}}
@endsection
