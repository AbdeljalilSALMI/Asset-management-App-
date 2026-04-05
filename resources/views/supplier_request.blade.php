@extends('layout_supplier')

@section('content')
<div class="container pt-4">
    <h2 class="mb-4"> Demandes des Equipements</h2>

    <table class="table table-bordered table-hover shadow">
        <thead class="table-dark">
            <tr>
                <th>Nom de l'asset</th>
                <th>Catégorie</th>
                <th>Status</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($request as $req)
                <tr>

                    <td>{{ $req->asset_name }}</td>
                    <td>{{ $req->category ? $req->category->name : 'N/A' }}</td>
                    <td>
                        @if($req->status == 'pending')
                            <span class="badge bg-warning"> En attente</span>
                        @elseif($req->status == 'accepted')
                            <span class="badge bg-success"> Acceptée</span>
                        @else
                            <span class="badge bg-danger"> Refusée</span>
                        @endif
                    </td>
                    <td>{{ $req->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        @if($req->status == 'pending')
    {{-- Accept button --}}
    <form action="{{ route('supplierhandle.accept', $req->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">✔ Accepter</button>
    </form>

    {{-- Refuse button --}}
    <form action="{{ route('supplierhandle.refuse', $req->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">✖ Refuser</button>
    </form>
@else
    <span class="text-muted">-</span>
@endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
