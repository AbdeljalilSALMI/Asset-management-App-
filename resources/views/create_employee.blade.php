@extends('layouts')

@section('content')
<div class="container pt-4">
    <h2>➕ Ajouter un employee</h2>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Fonction</label>
            <input type="text" name="function" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Département</label>
            <select name="department_id" class="form-control" required>
                <option value="">-- Sélectionner --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
</div>
<div class="mb-3">
    <label>Mot de passe</label>
    <input type="password" name="password" class="form-control" required>
</div>

        <button class="btn btn-success">💾 Enregistrer</button>


</div>
@endsection
<style> 
    form {
        max-width: 450px;
        margin: auto;
        border: 1px solid #fff;
    }
</style>