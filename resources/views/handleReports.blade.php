@extends('layoutS')
@section('title', 'Reports Management')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Employee Reports</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <table class="table table-bordered shadow-sm">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Asset</th>
                <th>Employee</th>
                <th>Description</th>
                <th>Status</th>
                <th>Reported At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->asset->name }}</td>
                    <td>{{ $report->employee->name }}</td>
                    <td>{{ $report->description }}</td>
                    <td>
                        <span class="badge bg-{{ $report->status == 'assigned' ? 'success' : ($report->status == 'refused' ? 'danger' : 'warning') }}">
                            {{ ucfirst($report->status ?? 'pending') }}
                        </span>
                    </td>
                    <td>{{ $report->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        @if(!$report->status || $report->status == 'pending')
                            <form action="{{ route('reports.accept', $report->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Accept</button>
                            </form>
                            <form action="{{ route('reports.refuse', $report->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Refuse</button>
                            </form>
                        @else
                            <em>No actions</em>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<style>
    .container {

        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }
</style>
@endsection
