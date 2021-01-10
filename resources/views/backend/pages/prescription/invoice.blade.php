@extends('backend.layouts.app')
@section('content')
@section('title', '| View Prescription')
@section('header-title', 'View Prescription')
@section('breadcrumb', 'View Prescription')
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