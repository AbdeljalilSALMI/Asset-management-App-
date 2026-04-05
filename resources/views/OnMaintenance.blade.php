@extends('layouts')

@section('content')

<div class="container py-4">
    <h2>Assets on Maintenance</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Asset</th>
                <th>Technician</th>
                <th>Description</th>
                <th>Cost</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($Maintenance as $item)
            <tr>
                <td>{{ $item->asset->name ?? 'N/A' }}</td>
                <td>{{ $item->technician->name ?? 'Unassigned' }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->cost }}</td>
                <td>{{ $item->date }}</td>
                <td>
                    <a href="{{ route('maintenance.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('maintenance.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
<style>
    .container {

        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }
</style>
@endsection
