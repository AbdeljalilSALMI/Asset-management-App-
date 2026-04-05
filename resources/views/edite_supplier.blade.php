@extends('layouts')

@section('content')
<div class="container py-4">
    <h2>Modifier fournisseur</h2>

    

    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom d'entreprise'</label>
            <input type="text" name="company_name" value="{{ old('company_name', $supplier->company_name) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
