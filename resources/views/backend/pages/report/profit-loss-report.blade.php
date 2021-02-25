@extends('backend.layouts.app')
@section('content')
@section('title','| Profit Loss Report')
@section('header-title', ' Profit Loss Report')
@section('breadcrumb', 'Profit Loss Report')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            {!! Form::open(['url' => '/admin/profit-loss-report','method'=>'get',"id"=>"form_insert"]) !!}
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
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <h4 class="text-center">Total Profit or Loss</h4>
                                <div class="col-sm-12 " >
                                    <table class="table table-bordered table-hover text-center text-blue-900">
                                        <thead>
                                            <tr>
                                                <th>Income</th>
                                                <th>Expense</th>
                                                <th>Profit Or Loss</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>{{ $incomeAmount ?? null}}</td>
                                                <td>{{ $expenseAmount ?? null}}</td>
                                                @if($profit < 0)
                                                <td style="color: red">{{ $profit }}</td>
                                                @else
                                                <td style="color: green">{{ $profit }}</td>

                                                @endif
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>


    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <h4 class="text-center">Income Table</h4>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($income as $incomeKey => $incomeValue)
                                        <tr>
                                            <td>{{ $incomeKey +1 }}</td>
                                            <td>{{ $incomeValue->date ?? null}}</td>
                                            <td>{{ $incomeValue->amount ?? null }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>NO DATA</td>
                                            <td>NO DATA</td>
                                            <td>NO DATA</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="col-sm-12 " >
                                    <table class="table table-bordered table-hover" style="color:green;">
                                    <td>Total Income</td>
                                    <td>{{ $incomeAmount }}</td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-12 col-xs-12">
                            <div class="table-responsive">
                                <h4 class="text-center">Expense Table</h4>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($expense as $expenseKey => $expenseValue)
                                        <tr>
                                            <td>{{ $expenseKey +1 }}</td>
                                            <td>{{ $expenseValue->date ?? null}}</td>
                                            <td>{{ $expenseValue->amount ?? null }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td>NO DATA</td>
                                            <td>NO DATA</td>
                                            <td>NO DATA</td>
                                            <td>NO DATA</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="col-sm-12 " >
                                    <table class="table table-bordered table-hover" style="color:green;">
                                    <td>Total Expense</td>
                                    <td>{{ $expenseAmount }}</td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    
    </div>
</div>




@endsection
