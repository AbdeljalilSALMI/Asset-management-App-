<h2>Your Assets</h2>
<table>
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    @foreach($assets as $asset)
        <tr>
            <td>{{ $asset->name }}</td>
            <td>{{ $asset->category->name }}</td>
            <td>
                <a href="{{ route('employee.report.form', $asset->id) }}">Report Issue</a>
            </td>
        </tr>
    @endforeach
</table>
