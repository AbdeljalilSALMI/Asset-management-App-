@extends('layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Asset requests</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($requests->isEmpty())
        <p>Il n'y a aucune demande.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-info">
                <tr>
                    <th>Asset Name</th>
                    <th>Category</th>
                    <th>Fournisseur</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ $request->asset_name }}</td>
                        <td>{{ $request->category->name ?? 'N/A' }}</td>
                        <td>{{ $request->supplier->company_name  }}</td>
                        <td><span class="badge bg-{{ $request->status == 'accepted' ? 'success' : ($request->status == 'refused' ? 'danger' : 'warning') }}">
                            {{ ucfirst($request->status ?? 'pending') }}
                        </span></td>
                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                        <td><form action="{{ route('requests.destroy', $request) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#eae5e4ff"><path d="M276-88q-45 0-75.5-30.5T170-194v-530h-40v-106h228v-48h246v48h228v106h-40v530q0 43.73-31.14 74.86Q729.72-88 686-88H276Zm410-636H276v530h410v-530ZM339-275h106v-368H339v368Zm178 0h106v-368H517v368ZM276-724v530-530Z"/></svg></button>
                </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<style>
    .container {

        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }
</style>
@endsection
