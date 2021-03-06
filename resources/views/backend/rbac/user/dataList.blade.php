<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $value)
            <tr >
                <td>
                    <img src="/{{ $value->picture ?? 'backend/files/no-img.png' }}" class="img-circle" alt="User Image" height="50" width="50">
                </td>
                <td>{{ $value->name ?? null}}</td>
                <td>{{ $value->email ?? null}}</td>
                <td>{{ 'User' }}</td>
                <td>
                    <form method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    {{-- <a class="btn btn-info btn-xs" href="{{url('admin/rbac/role_permission/'.$value->id.'/edit')}}"><i class="fa fa-eye"></i></a> --}}
                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                    {{-- <a class="btn btn-info btn-xs" href="{{url('admin/rbac/role'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>    --}}
                </td>
            </tr>
            @empty
                <tr>
                    <td>No Data</td>
                    <td>No Data</td>
                    <td>No Action</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
{{$data->links()}}
