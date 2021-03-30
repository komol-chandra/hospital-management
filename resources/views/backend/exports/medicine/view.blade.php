<table>
    <thead>
    <tr>
        <th style="text-align: center;">SL</th>
        <th style="text-align: center;">Created By</th>
        <th style="text-align: center;">Name</th>
        <th style="text-align: center;">Type</th>
        <th style="text-align: center;">Generic</th>
        <th style="text-align: center;">Manufacturer</th>
        <th style="text-align: center;">Unit Name</th>
        <th style="text-align: center;">SKU</th>
        <th style="text-align: center;">Tax</th>
        <th style="text-align: center;">Per Box</th>
        <th style="text-align: center;">Prices</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $key=> $value)
        <tr>
            <td style="text-align: center;">{{ $key++ }}</td>
            <td style="text-align: center;">{{ $value->user->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->medicineType->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->generic->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->manufacturer->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->unit->name ?? null }}</td>
            <td style="text-align: center;">{{ $value->sku ?? null }}</td>
            <td style="text-align: center;">{{ $value->tax ?? null }}</td>
            <td style="text-align: center;">{{ $value->per_box ?? null }}</td>
            <td style="text-align: center;">{{ $value->price ?? null }}</td>
        </tr>
    @endforeach
    </tbody>
</table>