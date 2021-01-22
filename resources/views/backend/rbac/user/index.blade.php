
@extends('backend.layouts.app')
@section('content')
@section('title', '|  user')
@section('header-title', 'user')
@section('breadcrumb', ' user')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <button type="button" class="btn btn-success m-r-2 m-b-5" data-toggle="modal" data-target="#modal-success"><i class="fa fa-plus"></i> Add New  User</button>                      

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
                <h1 class="modal-title">Add user</h1>
            </div>
            <div class="modal-body">
            {!! Form::open(['url' => '/admin/rbac/user','method'=>'post','files'=>true,'id'=>'form_insert']) !!}
            @include('backend.rbac.user.form');
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
                $form.attr('action','/admin/rbac/user/'+id);
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
@section('js')
<script src="{{asset('backend/script/user.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#form_insert'); !!}
{!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#form_update'); !!}
@endsection