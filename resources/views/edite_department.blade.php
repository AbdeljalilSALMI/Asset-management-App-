@extends('layouts')

@section('content')
<div class="container">
    <h2>Modifier le departement</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nom du departement</label>
            <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
