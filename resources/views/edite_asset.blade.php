@extends('layouts')

@section('content')
<h2><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#07391fff"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg> Modifier l'équipement</h2>

<form action="{{ route('assets.update', $asset) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="name" class="form-control" value="{{ $asset->name }}" required>
    </div>
    <div class="mb-3">
        <label>Numéro de série</label>
        <input type="text" name="serial_number" class="form-control" value="{{ $asset->serial_number }}" required>
    </div>
    <div class="mb-3">
        <label>Catégorie</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $asset->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Statut</label>
        <select name="status" class="form-control">
            <option value="available" {{ $asset->status == 'available' ? 'selected' : '' }}>Disponible</option>
            <option value="assigned" {{ $asset->status == 'assigned' ? 'selected' : '' }}>Assigné</option>
            <option value="maintenance" {{ $asset->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>
    </div>

    <button class="btn btn-primary">💾 Mettre à jour</button>
</form>
@endsection
