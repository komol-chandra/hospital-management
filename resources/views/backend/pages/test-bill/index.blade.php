@extends('backend.layouts.app')
@section('content')
@section('title','| Test Bill')
@section('header-title', 'Test Bill')
@section('breadcrumb', ' Test Bill')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-success" href="{{ url('/admin/test-bill/create') }}"> <i class="fa fa-plus"></i> Add Test Bill
                    </a>  
                </div>        
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="panel-header">
                        <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <label>Display 
                                    <select name="example_length">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> records per page</label>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
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
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Created By</th>
                                <th>Reference Name</th>
                                <th>Patient Name</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Paid</th>
                                <th>Due</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $value->users->full_name ?? null}}</td>
                                <td>{{ $value->reference ?? null}}</td>
                                <td>{{ $value->patient->full_name ?? null}}</td>
                                <td>{{ $value->date ?? null}}</td>
                                <td>{{ $value->grand_total ?? null}}</td>
                                <td>{{ $value->paid ?? null}}</td>
                                <td>{{ $value->due ?? null}}</td>
                                
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{url('admin/test-bill/'.$value->id)}}"><i class="fa fa-eye"></i></a>
                                    @if(!($value->due ==0))
                                    <button class="btn btn-info btn-xs edit" data-toggle="modal" type="button" data="{{$value->id}}" data-target="#modal-edit"><i class="fa fa-dollar"></i></button>  
                                    @endif
                                </td>
                                
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
                </div>
            </div>
        </div>
    </div>
</div>


<!--Edit Modal -->
<div class="modal fade modal-success" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Update Test-Bill</h1>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/admin/test-bill/'.$value->id.'','method'=>'put','files'=>true,'id'=>'form_update']) !!}
            {!! Form::hidden("id", null, ["class"=>"form-control e_id"]) !!}
            @include('backend.pages.test-bill.update-form');
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger close2" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update changes</button>
            </div>
            {!! Form::close() !!}
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
                $form.attr('action','/admin/prescription/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
<script>
    $(document).ready(function () {
    $(document).on("click", ".edit", function () {
        let data = $(this).attr("data");
        $.ajax({
            url: `/admin/test-bill/${data}/edit`,
            type: "get",
            dataType: "json",
            success: function (response) {
                $(".e_id").val(response.id);
                $(".e_grand_total").val(response.grand_total);
                $(".e_paid").val(response.paid);
                $(".e_due").val(response.due);
            },
        });
    });
    $(document).on("submit", "#form_update", function (e) {
        e.preventDefault();
        let id = $(".e_id").val();
        let data = $(this).serializeArray();
        console.log(data);
        console.log(id);

        $.ajax({
            url: `/admin/test-bill/${id}`,
            data: data,
            type: "PUT",
            dataType: "json",
            success: function (response) {
                console.log(response);
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });

                $(".close2").click();
                $("#form_update").trigger("reset");
            },
            error: function (error) {
                console.log(error);
            },
        });
    });
});
</script>
@endsection