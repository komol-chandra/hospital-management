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
                    <img src="/{{ $value->picture ?? 'backend/files/profile.jpg' }}" class="img-circle" alt="User Image" height="50" width="50">
                </td>
                <td>{{ $value->name ?? null}}</td>
                <td>{{ $value->email ?? null}}</td>
                <td>
                    @php
                        $name=collect($value->roles)->pluck('name')->first();
                        $id=collect($value->roles)->pluck('id')->first();
                    @endphp
                    {{ $name ? $name : "Not Set" }}
                </td>
                <td>
                    <form method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                    <button class="btn btn-info btn-xs edit" data-toggle="modal" type="button" data="{{$value->id}}" data-target="#modal-edit"><i class="fa fa-pencil"></i></button>   
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
{{$data->links()}}
