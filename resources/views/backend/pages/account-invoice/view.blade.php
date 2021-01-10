@extends('backend.layouts.app')
@section('content')
@section('title', '| View Account Invoice')
@section('header-title', 'View Account Invoice')
@section('breadcrumb', 'View Account Invoice')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div class="panel-body" id="printableArea">
                <div class="row">
                    <div class="col-sm-6 ">
                        <strong>Patient Info</strong><br>
                        <strong>Name:{{ $data->patient->name }}</strong><br>
                        <div>Code:{{ $data->patient->code }}</div>
                        <div>Email:{{ $data->patient->email }}</div>
                        <address>Address:{{ $data->patient->address }}<br>

                            <abbr title="Phone">P:</abbr>{{ $data->patient->mobile }}
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
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($detail as $key => $value)
                            <tr>
                                <td>{{ $value->account->name }}</td>
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
                <button type="button" class="btn btn-success"><i class="fa fa-dollar"></i> Make A Payment</button>
            </div>
        </div>
    </div>
</div>
@endsection