<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Blood</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = ($patients->currentpage()-1)* $patients->perpage() + 1;
            @endphp
            @forelse($patients as $key => $value)
            <tr>
                <td>{{ $i++ }}</td>
                <td>
                    <img src="/{{ $value->picture ?? 'backend/files/no-img.png' }}" class="img-circle" alt="User Image" height="50" width="50">
                </td>
                <td>{{ $value->full_name ?? null}}</td>
                <td>{{ $value->blood->name ?? null}}</td>

                <td>{{ $value->email ?? null}}</td>
                <td>{{ $value->mobile ?? null}}</td>
                
                <td>
                    <form method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                    <a class="btn btn-info btn-xs" href="{{url('admin/patient/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
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
{{$patients->links()}}