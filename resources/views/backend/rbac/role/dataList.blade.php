<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $key=>$value)
            <tr >
                <td>{{ $key+1}}</td>
                <td>{{ $value->name ?? null}}</td>
                <td>
                    <form method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    <a class="btn btn-info btn-xs" href="{{url('admin/rbac/role_permission/'.$value->id.'/edit')}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                    {{-- <a class="btn btn-info btn-xs" href="{{url('admin/rbac/role'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>    --}}
                </td>
            </tr>
            @empty
            <tr>
                <td>NO DATA</td>
                <td>NO Action</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>