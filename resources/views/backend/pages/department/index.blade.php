
@extends('backend.layouts.app')
@section('content')
@section('title', '|  Department')
@section('header-title', 'Department')
@section('breadcrumb', ' Department')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="{{ url('/admin/department/create') }}"> <i class="fa fa-plus"></i> Add Department
                    </a>  
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        {{-- <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div>
                        </div> --}}
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                {{-- <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a> --}}
                                    {{-- <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/downloadCVS') }}"><span>CSV</span></a> --}}
                                    {{-- <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/departmentPdf') }}"><span>PDF</span></a> --}}
                                    {{-- <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a> --}}
                                    {{-- <a class="btn btn-default buttons-excel buttons-html5 btn-sm"  href="{{ url('/admin/departmentExcel') }}"><span>Excel</span></a> --}}
                                </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            {{-- <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control" placeholder="search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div><!-- /input-group -->
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Detail</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($departments as $key=>$value)
                            <tr >
                                <td>{{ $key+1}}</td>
                                <td>{{ $value->name ?? null}}</td>
                                <td>{{ $value->description ?? null }}</td>
                                <td class="text-center">
                                    @if($value->status == 1)
                                    <i class="fa fa-circle" style="color:green"></i>
                                    @else
                                    <i class="fa fa-circle" style="color:red"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 1)
                                    <a class="btn btn-danger btn-xs" id="status" href="/admin/department/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @else
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/department/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/department/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>No Data</td>
                                    <td>No Data</td>
                                    <td>No Data</td>
                                    <td>No Action</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
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
                $form.attr('action','/admin/department/'+id);
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