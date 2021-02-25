@extends('backend.layouts.app')
@section('content')
@section('title','| Top Doctor By  Appointment Report')
@section('header-title', ' Top Doctor By Appointment Report')
@section('breadcrumb', 'Top Doctor By  Appointment Report')
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
                            {!! Form::open(['url' => '/admin/appointment-report','method'=>'get',"id"=>"form_insert"]) !!}
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
                                <th>Name</th>
                                <th>Department</th>
                                <th>Count</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = ($data->currentpage()-1)* $data->perpage() + 1;
                            @endphp
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $value->full_name ?? null}}</td>
                                <td>{{ $value->departments->name ?? null }}</td>
                                <td>{{ $value->appointments_count ?? null}}</td>
                                {{-- <td>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/appointment-report/'.$value->id)}}"><i class="fa fa-eye"></i></a> 
                
                                </td> --}}
                                
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
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
