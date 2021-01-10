<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>description</th>
    </tr>
    </thead>
    <tbody>
    @foreach($departments as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->description }}</td>
        </tr>
    @endforeach
    </tbody>
</table>