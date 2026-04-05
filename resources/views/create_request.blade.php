@extends('layouts')

@section('content')
<div class="container py-4">
    <h2>Nouvelle demande pour {{ $supplier->company_name }}</h2>

    <form action="{{ route('requests.store', $supplier->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom de l’actif</label>
            <input type="text" name="asset_name" class="form-control" required>
        </div>
            <div class="mb-3">
        <label>Catégorie</label>
        <select name="category_id" class="form-control" required>
            <option value="">-- Sélectionner --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
        <button type="submit" class="btn btn-success">Envoyer la demande</button>
    </form>
</div>
@endsection
