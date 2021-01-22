
@extends('backend.layouts.app')
@section('content')
@section('title', '|  Role')
@section('header-title', 'Role')
@section('breadcrumb', ' Role')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <button type="button" class="btn btn-success m-r-2 m-b-5" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i> Add New  Role</button>                      

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
                        {{-- <div class="col-sm-4 col-xs-12">
                            <div class="dataTables_length">
                                <a class="btn btn-default buttons-copy btn-sm" tabindex="0">
                                    <span>Copy</span></a>
                                    <a class="btn btn-default buttons-csv buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/downloadCVS') }}"><span>CSV</span></a>
                                    <a class="btn btn-default buttons-pdf buttons-html5 btn-sm" tabindex="0" href="{{ url('/admin/departmentPdf') }}"><span>PDF</span></a>
                                    <a class="btn btn-default buttons-print btn-sm" tabindex="0"><span>Print</span></a>
                                    <a class="btn btn-default buttons-excel buttons-html5 btn-sm"  href="{{ url('/admin/departmentExcel') }}"><span>Excel</span></a>
                                </div>
                        </div> --}}
                        <div class="col-sm-12 col-xs-12">
                            <div class="dataTables_length">
                                <div class="input-group custom-search-form">
                                    <input type="search" class="form-control search" placeholder="search..">
                                    {{-- <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span> --}}
                                </div><!-- /input-group -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dataList"></div>
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
                <h1 class="modal-title">Add Role</h1>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/admin/rbac/role','method'=>'post','files'=>true,'id'=>'form_insert']) !!}
            @include('backend.rbac.role.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save changes</button>
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
<!--Edit Modal -->
<div class="modal fade modal-success" id="modal-edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h1 class="modal-title">Update Account</h1>
            </div>
            <div class="modal-body">
            {{-- {!! Form::open(['url' => '/admin/account/'.$value->id.'','method'=>'put','files'=>true,'id'=>'form_update']) !!} --}}
            {!! Form::hidden("id", null, ["class"=>"form-control e_id"]) !!}
            @include('backend.pages.account.form');
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger " id="close2" data-dismiss="modal">Close</button>
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
                $form.attr('action','/admin/rbac/role/'+id);
                $form.submit()
            }, true],
            ['<button>NO</button>', function (instance, toast) {
                instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
            }],
        ],
    });
}
</script>
<script src="{{asset('backend/script/role.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\RoleRequest', '#form_insert'); !!}
{!! JsValidator::formRequest('App\Http\Requests\RoleRequest', '#form_update'); !!}
@endsection