@extends('backend.layouts.app')
@section('content')
@section('title', '| View Prescription')
@section('header-title', 'View Prescription')
@section('breadcrumb', 'View Prescription')

{{-- <div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <strong>Twitter, Inc.</strong><br>
                            1355 Market Street, Suite 900<br>
                            San Francisco, CA 94103<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
                        <address>
                            <strong>Full Name</strong><br>
                            <a href="https://thememinister.com/cdn-cgi/l/email-protection#be9d"><span class="__cf_email__" data-cfemail="81e7e8f3f2f5afede0f2f5c1e4f9e0ecf1ede4afe2eeec">[email&#160;protected]</span></a>
                        </address>
                    </div>
                    <div class="col-sm-6 text-left">
                        <h1 class="m-t-0">Invoice #0044777</h1>
                        <div>Issued March 19th, 2017</div>
                        <div class="text-danger m-b-15">Payment due April 21th, 2017</div>
                        <address>
                            <strong>Twitter, Inc.</strong><br>
                            1355 Market Street, Suite 900<br>
                            San Francisco, CA 94103<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </address>
                    </div>
                </div> <hr>
                <div class="table-responsive m-b-20">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item List</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Tax</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div><strong>The standard chunk of Lorem Ipsum used since</strong></div>
                                <small>It has survived not only five centuries, but also the leap into electronic .</small></td>
                                <td>3</td>
                                <td>$645.00</td>
                                <td>$321.20</td>
                                <td>$1286.20</td>
                            </tr>
                                <tr>
                                    <td><div><strong>The standard chunk of Lorem Ipsum used since</strong></div>
                                    <small>It has survived not only five centuries, but also the leap into electronic .</small></td>
                                    <td>3</td>
                                    <td>$486.00</td>
                                    <td>$524.20</td>
                                    <td>$789.20</td>
                                </tr>
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
                            <li><strong>Sub - Total amount:</strong> $9265 </li>
                            <li><strong>Discount:</strong> 12.9% </li>
                            <li><strong>VAT:</strong> ----- </li>
                            <li><strong>Grand Total:</strong> $12489 </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-left">
                <button type="button" class="btn btn-info" onclick="myFunction()"><span class="fa fa-print"></span></button>
                <button type="button" class="btn btn-success"><i class="fa fa-dollar"></i> Make A Payment</button>
                <a class="btn btn-primary" href="{{ url('/admin/prescription') }}"> <i class="fa fa-list"></i>Prescription List</a> 
            </div>
        </div>
    </div>
</div> --}}
<div class="row">

    <div class="col-sm-12" id="PrintMe">
    <div class="panel panel-default thumbnail">
    <div class="panel-heading no-print">
    <div class="btn-group">
        <a class="btn btn-primary" href="{{ url('/admin/prescription') }}"> <i class="fa fa-list"></i>Prescription List</a>
        <a class="btn btn-danger"  onclick="printDiv('printableArea')" tabindex="0"><span><i class="fa fa-print"></i></span></a>
    </div>
    </div>
    <div class="panel-body" id="printableArea">
    <div class="row">
    <div class="col-sm-12">
    
    <table class="table">
    <thead>
    <tr class="bg-primary">
    <td>
    <strong>Patient ID</strong>: {{ $data->patient->code }},
    {{-- <strong>App ID</strong>: ABCDBIE22 </td> --}}
    <td class="text-right"><strong>Date</strong>: {{ $data->date }} </td>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td width="50%">
    <ul class="list-unstyled">
     <li><strong>{{ $data->doctor->name }}</strong></li>
    <li>{{ $data->doctor->designation ?? 'null'}}</li>
    <li><strong>{{ $data->doctor->departments->name }}</strong></li>
    <li>{{ $data->doctor->education ?? 'null' }}</li>
    <li>{{ $data->doctor->address ?? 'null' }}</li>
    </ul>
    </td>
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
    <tfoot>
    <tr class="bg-primary">
    <td colspan="2">
    <strong>Patient Name</strong>: {{ $data->patient->name }},
    <strong>Age</strong>: {{ $age}} Years,
    <strong>Sex</strong>: {{ $data->patient->gender == 1 ? "Male": "Female" }},
    {{-- <strong>Weight</strong>: 93,
    <strong>BP</strong>: , --}}
    <strong>Insurance Name</strong>: </td>
    </tr>
    </tfoot>
    </table>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
    <div class="chief_complain">
    
    <p>
    <strong>Patient History</strong>: {{ $data->history ?? 'null' }}
    </p>
    
    <p>
    <strong>Patient Notes</strong>: {{ $data->note ?? 'null' }}</p>
    </div>
    <div class="prescript_medicine">
    
    <table class="table table-striped">
    <thead>
    <tr class="bg-info header-2">
    <th>Medicine Name</th>
    <th>Type</th>
    <th width="80">duration</th>
    <th width="80">sequence</th>
    <th width="80">Days</th>
    <th>Instruction</th>
    </tr>
    </thead>
    <tbody>
        

    @forelse($medicineData as $key => $value)
    <tr>
        {{-- <td>{{ $value->name }}</td> --}}
        <td>{{ $value->medicines->name }}</td>
        <td>{{ $value->medicines->medicineType->name }}</td>
        <td>{{ $value->duration }}</td>
        <td>{{ $value->sequence }}</td>
        <td>{{ $value->day }} Days</td>
        <td>{{ $value->instruction }}</td>


        </tr>
    @empty
        No Data
    @endforelse
    </tbody>
    </table>
    
    <table class="table table-striped">
    <thead>
    <tr class="bg-info header-2">
    <th>Diagnosis</th>
    <th>Instruction</th>
    </tr>
     </thead>
    <tbody>
    <tr>
    <td></td>
    <td></td>
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
    
    <table class="table">
    <thead>
    <tr>
    <th class="pres-w-50"></th>
    <td class="pres-w-50">
    <div class="pres-signature"></div>
    <i>Signature</i>
    </td>
    </tr>
    </thead>
    </table>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection