
@extends('backend.layouts.app')
@section('content')
@section('title', '|  Medicine')
@section('header-title', 'Medicine')
@section('breadcrumb', ' Medicine')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd ">
            <div class="panel-heading">
                <div class="row">
                    <div class="btn-group col-sm-12">
                            <div class="col-sm-6">
                                <a class="btn btn-success" href="{{ url('/admin/medicine/create') }}"> <i class="fa fa-plus"></i> Add Medicine</a>
                                <a class="btn btn-success" href="{{ url('/admin/medicine') }}">Refresh</a>
                            </div>

                            <div class="col-sm-6 float-left">
                                <form action="/admin/medicine-import" method="post" enctype="multipart/form-data">@csrf
                                    <div class="col-sm-6 "><input type="file" name="file" class="form-control float-left"></div>
                                    <div class="col-sm-6 float-right"><button class=" btn btn-black " type="submit" > Import</button></div>
                                </form>  
                            </div>
                    </div>
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-4 col-xs-12">
                            
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" href="/admin/medicine-pdf"><span>PDF</span></a>
                                <a class="btn btn-default buttons-excel buttons-html5 btn-sm" tabindex="0" href="/admin/medicine-excel"><span>Excel</span></a>
                                <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" href="/admin/medicine-csv"><span>CSV</span></a>
                                <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>
                                </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <form action="/admin/medicine" method="get">
                                    <div class="input-group custom-search-form">
                                        <input type="search" name="search" class="form-control" placeholder="search..">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="submit">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div><!-- /input-group -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Created By</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Generic</th>
                                <th>Manufacturer</th>
                                <th>SKU</th>
                                <th>Tax</th>
                                <th>Per Box</th>
                                <th>Prices</th>
                                <th>status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = ($data->currentpage()-1)* $data->perpage() + 1;
                            @endphp
                            @forelse ($data as $value)
                            <tr >
                                <td>{{ $i++ }}</td>
                                <td>
                                    <img src="/{{ $value->picture ?? 'backend/files/no-img.png' }}" class="img-circle" alt="User Image" height="50" width="50">

                                </td>
                                <td>{{ $value->user->name ?? null}}</td>
                                <td>{{ $value->name ?? null}}</td>
                                <td>{{ $value->medicineType->name ?? null }}</td>
                                <td>{{ $value->generic->name ?? null}}</td>
                                <td>{{ $value->manufacturer->name ?? null}}</td>
                                <td>{{ $value->sku ?? null}}</td>
                                <td>{{ $value->tax ?? null}}</td>
                                <td>{{ $value->per_box ?? null}}</td>
                                <td>{{ $value->price ?? null}}</td>

                                <td class="text-center">
                                    @if($value->status == 1)
                                    <i class="fa fa-circle" style="color:green"></i>
                                    @else
                                    <i class="fa fa-circle" style="color:red"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($value->status == 1)
                                    <a class="btn btn-danger btn-xs" id="status" href="/admin/medicine/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @else
                                    <a class="btn btn-info btn-xs" id="status" href="/admin/medicine/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                                    @endif
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/medicine/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
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
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO DATA</td>
                                <td>NO Action</td>
                                
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
                $form.attr('action','/admin/medicine/'+id);
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