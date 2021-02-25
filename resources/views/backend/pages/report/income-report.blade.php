@extends('backend.layouts.app')
@section('content')
@section('title','| Income Report')
@section('header-title', 'Income Report')
@section('breadcrumb', ' Income Report')
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
                            {!! Form::open(['url' => '/admin/income-report','method'=>'get',"id"=>"form_insert"]) !!}
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
                {{-- @include('backend.pages.appointment.data-list',[ 'search'=> $search]) --}}
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $value->type ?? null}}</td>
                                <td>{{ $value->date ?? null }}</td>
                                <td>{{ $value->amount ?? null}}</td>
                                </td>
                                <td>
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/income-report/'.$value->id)}}"><i class="fa fa-eye"></i></a> 
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
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
                        <td>Total Income</td>
                        <td>{{ $amount }}</td>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function Delete(id){
    var id=id;
    iziToast.question({
        timeout: 20000,
        close: true,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        title: 'Wait!',
        message: 'Are you sure? Once Deleted Can\'t be undone!',
        position: 'center',
        buttons: [
            ['<button><b>YES</b></button>', function () {
                var $form = $("#deleteForm").closest('form');
                $form.attr('action','/admin/income-report/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
@endsection
