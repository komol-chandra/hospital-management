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
                    <a class="btn btn-success" href="{{ url('/admin/stock/create') }}"> <i class="fa fa-plus"></i> Add Stock
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
                                    <a class="btn btn-danger btn-xs" id="status" href="/admin/stock/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @else
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/stock/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <a class="btn btn-info btn-xs" href="{{url('admin/stock/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
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
                {{-- {{ $schedules->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection