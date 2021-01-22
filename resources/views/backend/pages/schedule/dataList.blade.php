<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>SL</th>
                <th>Doctor Name</th>
                <th>Day</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Quantity</th>
                <th>status</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($schedules as $key => $value)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->doctors->name ?? null}}</td>
                <td>{{ $value->days->name ?? null}}</td>
                <td>{{ $value->starting ?? null}}</td>
                <td>{{ $value->ending ?? null}}</td>
                <td>{{ $value->quantity ?? null}}</td>
                <td class="text-center">
                    @if($value->status == 1)
                    <i class="fa fa-circle" style="color:green"></i>
                    @else
                    <i class="fa fa-circle" style="color:red"></i>
                    @endif
                </td>
                <td>
                    @if($value->status == 1)
                    <a class="btn btn-danger btn-xs" id="status" href="/admin/schedule/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                    @else
                    <a class="btn btn-info btn-xs" id="status" href="/admin/schedule/status/{{ $value->id }}"><i class="fa fa-refresh"></i></a>
                    @endif
                    <form method="post" id="deleteForm">
                        @method('delete')
                        @csrf
                    </form>
                    <a class="btn btn-danger btn-xs" onclick="event.preventDefault(); Delete({{ $value->id }});"><i class="fa fa-trash-o"></i></a>
                    <a class="btn btn-info btn-xs" href="{{url('admin/schedule/'.$value->id.'/edit')}}"><i class="fa fa-pencil"></i></a>   
                </td>
            </tr>
            @empty
            <tr>
                <td>NO DATA</td>
                <td>NO DATA</td>
                <td>NO DATA</td>
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
{{ $schedules->links() }}