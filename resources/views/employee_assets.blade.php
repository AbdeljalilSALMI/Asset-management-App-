@extends('layout_employee')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">My Assets</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($assets->isEmpty())
        <p>You don't have any assets assigned yet.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Asset Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->category->name ?? 'N/A' }}</td>
                        <td>{{ $asset->status ?? 'Available' }}</td>
                        <td>
                            <a href="{{ route('employee.report.form', $asset->id) }}" class="btn btn-warning btn-sm">
                                Report Issue
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
