@extends('backend.layouts.app')
@section('content')
@section('title','| Expense Report')
@section('header-title', 'Expense Report')
@section('breadcrumb', ' Expense Report')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="">   
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['url' => '/admin/expense-report','method'=>'get',"id"=>"form_insert"]) !!}
                            <div class="col-sm-4"><h4>Fliter By Type</h4></div>
                            <div class="col-sm-4 form-group">
                                <select class="form-control" name="type">
                                    <option  selected disabled>Select One</option>
                                    <option value="today">Today</option>
                                    <option value="lastDay">Lastday</option>
                                    <option value="thisWeek">This Week</option>
                                    <option value="lastWeek">Last Week</option>
                                    <option value="thisMonth">This Month</option>
                                    <option value="lastMonth">Last Month</option>
                                    <option value="last3Month">Last 3 Mounth</option>
                                    <option value="last6Month">Last 6 Mounth</option>
                                    <option value="thisYear">This Year</option>
                                    <option value="lastYear">Last Year</option>
                                  </select>
                            </div>
                            <div class="col-sm-2 reset-button">
                                <button type="submit" class="btn btn-success float-left">Serach</button>
                            </div>
                            <div class="col-sm-2"></div>
                        {!! Form::close() !!}
                        </div>
                        
                        {{-- <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0"><span>Excel</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>
                                    
                                </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control" placeholder="search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Created By</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                                $i = ($data->currentpage()-1)* $data->perpage() + 1;
                            @endphp --}}
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $value->users->name ?? null}}</td>
                                <td>{{ $value->date ?? null }}</td>
                                <td>{{ $value->amount ?? null}}</td>
                            </tr>
                            @empty
                            <tr>
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
                    <div class="col-sm-12 " >
                        <table class="table table-bordered table-hover" style="color:green;">
                        <td>Total Expense</td>
                        <td>{{ $amount }}</td>
                        </table>
                    </div>
                    {{-- {{ $data->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
