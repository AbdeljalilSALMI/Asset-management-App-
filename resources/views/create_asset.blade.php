@extends('layouts')

@section('content')
<div class="container pt-4">
<h2>➕ Ajouter un équipement</h2>

<form action="{{ route('assets.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Numéro de série</label>
        <input type="text" name="serial_number" class="form-control" required>
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
    <div class="mb-3">
        <label>Statut</label>
        <select name="status" class="form-control">
            <option value="available">Disponible</option>
            <option value="assigned">Assigné</option>
            <option value="maintenance">Maintenance</option>
        </select>
    </div>
    <button class="btn btn-success">💾 Enregistrer</button>
</form>
</div>
<style>
    form {
        max-width: 450px;
        margin:  auto;
        border: 1px solid #fff;
    }
</style>
@endsection
