@extends('backend.layouts.app')
@section('content')
@section('title','| expense')
@section('header-title', 'expense')
@section('breadcrumb', 'expense')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <button type="button" class="btn btn-success m-r-2 m-b-5" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i> Add New  expense</button>                      
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @forelse($data as $key => $value)
                            <tr>
                                <td>{{ $value->name ?? null }}</td>
                                
                                <td>
                                    <form method="post" id="deleteForm">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                                </td>
                                
                            </tr>
                            @empty
                            <tr>
                                <td>NO DATA</td>
                                <td>NO ACTION</td>
                            </tr>
                            @endforelse
                                
                            
                        </tbody>
                       
                    </table>
                    {{-- {{ $data->links() }} --}}

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Modal -->
<div class="modal fade modal-success" id="modal-success" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Add Account</h1>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/admin/expense','method'=>'post','files'=>true,'id'=>'form_insert']) !!}
            <div class="col-sm-12 form-group">
                <label>Type Name <span class="text-danger">*</span></label>
                {!! Form::text("name", null, ["class"=>"form-control "]) !!}
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
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
                $form.attr('action','/admin/expense/'+id);
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
    $(this).on("submit", "#form_insert", function (e) {
        e.preventDefault();
        let data = $(this).serializeArray();
        $.ajax({
            url: `/admin/expense`,
            data: data,
            type: "post",
            dataType: "json",
            success: function (response) {
                iziToast.success({
                    title: response.title,
                    message: response.message,
                    position: "topRight",
                });
                $("#close").click();
                $("#form_insert").trigger("reset");
            },
            error: function (error) {
                console.log(error);
                alert("Field Requeued");
            },
        });
    });
    
});
</script>
{{-- <script src="{{asset('backend/script/account.js')}}"></script> --}}
<!-- Javascript Requirements -->

<!-- Laravel Javascript Validation -->
{!! JsValidator::formRequest('App\Http\Requests\ExpenseRequest', '#form_insert'); !!}
{!! JsValidator::formRequest('App\Http\Requests\AccountRequest', '#form_update'); !!}
@endsection