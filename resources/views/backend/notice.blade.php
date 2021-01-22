<div class="panel-body">
    <div class="table-responsive">
        <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>designation</th>
                    <th>Starting Date</th>
                    <th>Ending Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notices as $key => $value)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{!! $value->designation !!}</td>
                    <td>{{ $value->start_date }}</td>
                    <td>{{ $value->end_date }}</td>
                </tr>
                @empty
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                <td>No Data</td>
                @endforelse
            </tbody>
        </table>
    </div>
</div>