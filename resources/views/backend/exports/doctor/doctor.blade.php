<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Department</th>
        <th>Mobile</th>
    </tr>
    </thead>
    <tbody>
    @foreach($doctor as $value)
        <tr>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->mobile }}</td>
        </tr>
    @endforeach
    </tbody>
</table>