@extends('backend.layouts.app')
@section('content')
@section('title','| Income Report')
@section('header-title', 'Income Report')
@section('breadcrumb', ' Income Report')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd">
            <div class="panel-body">
                <h3 class="m-t-0">Income Details</h3>
                    <div class="row view-spacer">
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Patient Name:</label>
                            <p>{{ $data->patient->full_name }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="income_head" class="font-weight-bold">Income Type:</label>
                            <p>{{ $data->type }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="invoice_number" class="font-weight-bold">Invoice Number:</label>
                            <p>{{ "Null" }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="date" class="font-weight-bold">Date:</label>
                            <p>{{ $data->date }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="amount" class="font-weight-bold">Amount:</label>
                            <p><b></b> {{ $data->amount }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="attachment" class="font-weight-bold">Attachment:</label>
                        <br>{{ "Null" }}
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description:</label>
                            <p>{{ "Null" }}</p>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="created_at" class="font-weight-bold">Created On:</label>
                            <br>
                            <span data-toggle="tooltip" data-placement="right" title="" data-original-title="8th Dec, 2020">{{ $data->created_at }}</span>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                            <label for="updated_at" class="font-weight-bold">Created By:</label>
                            <br>
                            <span data-toggle="tooltip" data-placement="right" title="" data-original-title="22nd Jan, 2021">{{ $data->users->full_name }}</span>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection
