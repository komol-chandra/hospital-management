@extends('layouts.app')
@section('content')
<div>
    <h3>Permission</h3>
    <br />
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title"><b>{{ $role->name }} Permission List</b></div>
            <div class="panel-options">
                <a class="btn btn-blue btn-sm" href="/role" style="color:white;margin-top:4px;">Role</a>
            </div>
        </div>

        <div class="panel-heading">
            <div class="pull-left col-sm-1">
            </div>
            <div class="pull-right">
            </div>
        </div>
        <div class="panel-body">
            <center>
                <div class="text-center" style="border: 1px solid #0072bc;height: 3rem;width: 35%;background-color: #0072bc; margin-bottom:1%">
                    <b>
                        <p style="color: white;margin-top: 3px;">Permissions</p>
                    </b>
                </div>
            </center>
            <div class="row">
                <div class="col-md-6">
                    <center>
                        <div class="text-center" style="border: 1px solid darkgray;height: 3rem;width: 19rem;background-color: currentcolor; margin-bottom:1%">
                            <b>
                                <p style="color: white;margin-top: 3px;">Module's Permissions</p>
                            </b>
                        </div>
                    </center>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Permission</th>
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
                <div class="col-md-6">
                    <center>
                        <div class="text-center" style="border: 1px solid darkgray;height: 3rem;width: 19rem;background-color: currentcolor; margin-bottom:1%">
                            <b>
                                <p style="color: white;margin-top: 3px;">Feature's Permissions</p>
                            </b>
                        </div>
                    </center>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Permission</th>
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

            <div class="col-md-6">
                <center>
                    <div class="text-center" style="border: 1px solid darkgray;height: 3rem;width: 19rem;background-color: currentcolor; margin-bottom:1%">
                        <b>
                            <p style="color: white;margin-top: 3px;">Control's Permissions</p>
                        </b>
                    </div>
                </center>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Permission</th>
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
@stop
@section('js')
<script>
    $(".permission_check").change(function() {
        if ($(this).is(':checked')) {
            let permission_id = $(this).val();
            $.ajax({
                url: "/role_permission/{{ $role->id }}"
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
            let permission_id = $(this).val();
            $.ajax({
                url: "/role_permission/{{ $role->id }}"
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
@stop