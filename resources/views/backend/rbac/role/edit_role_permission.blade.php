@extends('backend.layouts.app')
@section('content')
@section('title', '| Permission')
@section('header-title', 'Permission')
@section('breadcrumb', 'Permission')
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="btn-group"> 
                    <a class="btn btn-primary" href="{{ url('/admin/rbac/role') }}"> <i class="fa fa-list"></i>Permission List</a>  
                </div>
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
                    <div class="col-sm-4">
                        <h4>Module's Permissions</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                        @foreach ($modules as $key=>$value)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center"><input class="permission_check" type="checkbox" value="{{ $value->id }}" {{ in_array($value->id,$role_permission) ? "checked" : "" }}></td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4>Feature's Premition </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($j=1)
                                        @foreach($features as $key => $value)
                                        <tr>
                                            <td class="text-center">{{ $j++ }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td class="text-center"><input class="permission_check" type="checkbox" value="{{ $value->id }}" {{ in_array($value->id,$role_permission) ? "checked" : "" }}></td>
                                        </tr>
                                        @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <h4 >Control Premition </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Permission</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($k=1)
                                    @foreach($controls as $key => $value)
                                    <tr>
                                        <td class="text-center">{{ $k++ }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td class="text-center"><input class="permission_check" type="checkbox" value="{{ $value->id }}" {{ in_array($value->id,$role_permission) ? "checked" : "" }}></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(".permission_check").change(function() {
        if ($(this).is(':checked')) {
            let permission_id = $(this).val();
            $.ajax({
                url: "/admin/rbac/role_permission/{{ $role->id }}"
                , data: {
                    "permission_id": permission_id
                    , "_token": "{{ csrf_token() }}"
                , }
                , type: "put"
                , success: function(data) {
                    iziToast.success({
                        title: data.title
                        , message: data.message
                        , position: 'topRight'
                    , });
                }
            });
        } else {
            console.log('else');
            let permission_id = $(this).val();
            $.ajax({
                url: "/admin/rbac/role_permission/{{ $role->id }}"
                , data: {
                    "permission_id": permission_id
                    , "_token": "{{ csrf_token() }}"
                , }
                , type: "delete"
                , success: function(data) {
                    iziToast.warning({
                        title: data.title
                        , message: data.message
                        , position: 'topRight'
                    , });
                }
            });
        }
    });
</script>
@endsection