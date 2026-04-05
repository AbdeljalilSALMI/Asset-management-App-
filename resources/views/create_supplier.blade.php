
@extends('layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Ajouter un Fournisseur</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur !</strong> Veuillez corriger les problèmes suivants :<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="company_name" class="form-label">Nom de l'entreprise</label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Téléphone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
        </div>

        <hr>
        <h4>Informations de connexion (Utilisateur)</h4>

        <div class="mb-3">
            <label for="name" class="form-label">Nom utilisateur</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
