@extends('backend.layouts.app')
@section('content')
@section('title', '| View Account Invoice')
@section('header-title', 'View Account Invoice')
@section('breadcrumb', 'View Account Invoice')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <a class="btn btn-success" href="{{ url('/admin/test-bill') }}">  Test Bill List
            </a>
            <div class="panel-body" id="printableArea">
                <div class="row">
                    <div class="col-sm-6 ">
                        <strong>Patient Info</strong><br>
                        <strong>Name:{{ $data->patient->full_name }}</strong><br>
                        <div>Mobile:{{ $data->patient->mobile }}</div>
                        <div>Email:{{ $data->patient->email }}</div>
                        <address>Address:{{ $data->patient->address }}<br>

                            {{-- <abbr title="Phone">P:</abbr>{{ $data->patient->mobile }} --}}
                        </address>
                    </div>
                    <div class="col-sm-6 text-right float-left">
                        <address>
                            <strong class="text-danger">Payment due in {{ $data->date }}</strong><br>
                            <strong >{{ $settings->title }}</strong><br>
                            {{ $settings->address }}<br>
                            <abbr title="Phone">P:</abbr>{{ $settings->contact }}<br>
                            <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                        </address>
                    </div>
                    
                </div> <hr>
                <div class="table-responsive m-b-20">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Test Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($detail as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->test->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->quantity }}</td>
                                <td>{{ $value->price }}</td>
                                <td>{{ $value->sub_total }}</td>
                                    
                            </tr>
                            @empty
                                No Data
                            @endforelse
                            
                                
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
                            standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                            to make a type specimen book.</p>
                            <p><strong>Thank you very much for choosing us. It was a pleasure to have worked with you.</strong></p>
                            <img src="assets/dist/img/credit/AM_mc_vs_ms_ae_UK.png" class="img-responsive" alt="">

                    </div>
                    <div class="col-sm-4">
                        <ul class="list-unstyled text-left">
                            <li><strong>Total:</strong> {{ $data->total }} </li>
                            <li><strong>VAT:</strong>{{ $data->vat ?? 'null' }}</li>
                            <strong>Discount:</strong>{{ $data->discount ?? 'null' }}</li>
                            <li><strong>Grand Total:</strong> {{ $data->grand_total }} </li>
                            <li><strong>Paid:</strong>{{ $data->paid ?? 'null' }}</li>
                            <li><strong>Due:</strong>{{ $data->due ?? 'null' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-left">
                <button type="button" class="btn btn-info" onclick="printDiv('printableArea')"><span class="fa fa-print"></span></button>
                {{-- <button type="button" class="btn btn-success"><i class="fa fa-dollar"></i> Make A Payment</button> --}}
                @if(!($data->due ==0))
                <button class="btn btn-info edit" data-toggle="modal" type="button" data="{{$data->id}}" data-target="#modal-edit"><i class="fa fa-dollar"></i> Make A Payment</button> 
                @endif
            </div>
        </div>
    </div>
</div>
<!--Edit Modal -->
<div class="modal fade modal-success" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Update Test-Bill</h1>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/admin/test-bill/'.$data->id.'','method'=>'put','files'=>true,'id'=>'form_update']) !!}
            {!! Form::hidden("id", null, ["class"=>"form-control e_id"]) !!}
            @include('backend.pages.test-bill.update-form');
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function () {
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/test-bill/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_grand_total").val(response.grand_total);
                $(".e_paid").val(response.paid);
                $(".e_due").val(response.due);
            },
        });
    });
    $(document).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        console.log(data);
        console.log(id);

        $.ajax({
            url: `/admin/test-bill/${id}`,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });

                $(".close2").click();
                $("#form_update").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
</script>
@endsection
