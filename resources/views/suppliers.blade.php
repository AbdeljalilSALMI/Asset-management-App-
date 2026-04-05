@extends('layouts')

@section('content')
<div class="container py-4">
    <h2>Liste des fournisseurs</h2>
    <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Ajouter un fournisseur</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company name</th>
                <th>Téléphone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->company_name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="{{ route('requests.create', $supplier->id) }}" class="btn btn-info btn-sm">Faire une demande</a>

                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
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
