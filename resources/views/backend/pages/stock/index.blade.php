@extends('backend.layouts.app')
@section('content')
@section('title','| Stock')
@section('header-title', 'Stock')
@section('breadcrumb', ' Stock')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="btn-group">
                    <a class="btn btn-success" href="{{ url('/admin/stock/create') }}"> <i class="fa fa-plus"></i> Add
                        Stock
                    </a>
                </div>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Manufacturer Name</th>
                            <th>Total Amount</th>
                            <th>Paid</th>
                            <th>Due</th>
                            <th>status</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->today_date ?? null}}</td>
                                <td>{{ "#".$value->id ?? null}}</td>
                                <td>{{ $value->manufacturer_id ?? "null"}}</td>
                                <td>{{ $value->grand_total ?? null}}</td>
                                <td>{{ $value->pay ?? null}}</td>
                                <td>{{ $value->due ?? null}}</td>

                                <td class="text-center">
                                    @if($value->status == 1)
                                        <i class="fa fa-circle" style="color:green"></i>
                                    @else
                                        <i class="fa fa-circle" style="color:red"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 1)
                                        <a class="btn btn-danger btn-xs" id="status"
                                           href="/admin/stock/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @else
                                        <a class="btn btn-info btn-xs" id="status"
                                           href="/admin/stock/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <button class="btn btn-info btn-xs edit" data-toggle="modal" type="button"
                                            data="{{$value->id}}" data-target="#modal-edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO ACTION</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-success" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h1 class="modal-title">Update Stock</h1>
            </div>
            <form action="#" method="post" id="update_form">@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" id="id" value="">
                                <div class="col-sm-3"><label> Date:</label></div>
                                <div class="col-sm-9"><p id="date"></p></div>
                            </div>
                            <div class="col-sm-6">
                                <h4>Manufacturer</h4>
                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Name:</label></div>
                                    <div class="col-sm-9"><p id="manufacturerName">null</p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Email:</label></div>
                                    <div class="col-sm-9"><p id="manufacturerEmail">null</p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Mobile:</label></div>
                                    <div class="col-sm-9"><p id="manufacturerMobile">null</p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Address:</label></div>
                                    <div class="col-sm-9"><p id="manufacturerAddress">null</p></div>
                                </div>
                            </div>

                            <div class="col-sm-6 form-group">
                                <h4>Supplier</h4>
                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Name:</label></div>
                                    <div class="col-sm-9"><p id="supplierName"></p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Email:</label></div>
                                    <div class="col-sm-9"><p id="supplierEmail">null</p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Mobile:</label></div>
                                    <div class="col-sm-9"><p id="supplierMobile">null</p></div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="col-sm-3"><label> Address:</label></div>
                                    <div class="col-sm-9"><p id="supplierAddress">null</p></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Batch</th>
                                    <th>Product</th>
                                    <th>Sku</th>
                                    <th>Quantity</th>
                                    <th>Sale price</th>
                                    <th>Purchase price</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody id="productLoop">

                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-12 float-left">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-4">
                                <div class="col-sm-6"><strong>Total Amount:</strong></div>
                                <div class="col-sm-6"><p id="totalAmount"></p></div>
                                <div class="col-sm-6"><strong>Paid Amount:</strong></div>
                                <div class="col-sm-6"><p id="paid"></p></div>
                                <div class="col-sm-6"><strong>Due Amount:</strong></div>
                                <div class="col-sm-6"><p id="due"></p></div>
                                <div class="col-sm-6"><strong>Pay Now:</strong></div>
                                <div class="col-sm-6"><input class="form-control" type="number" id="payNow"
                                                             name="payNow"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger " id="close2" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update changes</button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $(this).on("click", ".edit", function () {
                let data = $(this).attr("data");
                console.log(data);
                $.ajax({
                    url: `/admin/stock/${data}/edit`,
                    type: "get",
                    dataType: "json",
                    success: function (response) {
                        console.log(response.stockBase);
                        $("#date").text(response.stockBase.today_date);
                        $("#id").val(response.stockBase.id);
                        $("#totalAmount").text(response.stockBase.grand_total);
                        $("#paid").text(response.stockBase.pay);
                        $("#due").text(response.stockBase.due);
                        let loopHtml = "";
                        $.each(response.stockDetails, function (index, value) {
                            loopHtml += `<tr>
                                    <td>${index++}</td>
                                    <td>${value.batch}</td>
                                    <td>${value.medicine.name}</td>
                                    <td>${value.medicine.sku}</td>
                                    <td>${value.qty}</td>
                                    <td>${value.sale_rate}</td>
                                    <td>${value.purchase_rate}</td>
                                    <td>${value.sub_total}</td>
                                </tr>`
                        });
                        $("#productLoop").html(loopHtml);

                    },
                });
            });

            $(this).on("submit", "#update_form", function (e) {
                e.preventDefault();
                let id = $("#id").val();
                let data = $(this).serializeArray();
                ;
                console.log(payNow);
                $.ajax({
                    url: `/admin/stock/${id}`,
                    data: data,
                    type: "PUT",
                    dataType: "json",
                    success: function (response) {
                        iziToast.success({
                            title: response.title,
                            message: response.message,
                            position: "topRight",
                        });
                        $("#close2").click();
                        $("#update_form").trigger("reset");
                    },
                    error:function (error){
                        alert('Error');
                    }
                })

            })
        });
    </script>
@endsection
