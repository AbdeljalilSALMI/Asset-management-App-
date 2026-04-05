@extends('layouts')

@section('content')
<div class="container py-4">
<h3> Liste des équipements</h3>
<a href="{{ route('assets.create') }}" class="btn btn-primary mb-3">+ Ajouter un équipement</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
            
            <th>Numéro de série</th>
            <th>Catégorie</th>
            <th>Statut</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assets as $asset)
        <tr>
            <td>{{ $asset->name }}</td>
            
            <td>{{ $asset->serial_number }}</td>
            <td>{{ $asset->category->name ?? '-' }}</td>
            <td>{{ $asset->status }}</td>
            <td>
                <a href="{{ route('assets.edit', $asset) }}" class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffffff"><path d="M194-194h57l371-371-57-56-371 371v56ZM88-88v-206l558-558q11-11 24.5-15.5T698-872q14 0 26.5 4t23.5 15l105 105q11 11 15 24t4 27q0 14-4.5 27T852-646L294-88H88Zm666-609-57-56 57 56ZM594-593l-29-28 57 56-28-28Z"/></svg></a>
                <form action="{{ route('assets.destroy', $asset) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#eae5e4ff"><path d="M276-88q-45 0-75.5-30.5T170-194v-530h-40v-106h228v-48h246v48h228v106h-40v530q0 43.73-31.14 74.86Q729.72-88 686-88H276Zm410-636H276v530h410v-530ZM339-275h106v-368H339v368Zm178 0h106v-368H517v368ZM276-724v530-530Z"/></svg></button>
                </form>
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
