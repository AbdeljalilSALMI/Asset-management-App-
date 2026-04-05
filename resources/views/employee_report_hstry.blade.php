@extends('layout_employee')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"> Mes Rapports</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reports->isEmpty())
        <div class="alert alert-info">
            Vous n’avez encore aucun équipement signalé.
        </div>
    @else
        <table class="table table-bordered table-hover shadow-sm align-middle">
            <thead class="table-success">
                <tr>
                    <th>Équipement</th>
                    <th>Catégorie</th>
                    <th>Description du problème</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td class="fw-semibold">{{ $report->asset->name }}</td>
                        <td>{{ $report->asset->category->name ?? 'N/A' }}</td>
                        <td>{{ $report->description }}</td>
                        <td>
                            @if($report->status === 'pending')
                                <span class="badge bg-warning text-dark">En attente</span>
                            @elseif($report->status === 'resolved')
                                <span class="badge bg-success">Résolu</span>
                            @else
                                <span class="badge bg-secondary">En cours</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
