@extends('layouts')

@section('content')
<div class="container pt-4">
    <h2>Equipements dans cette catégorie : {{ $category->name }}</h2>

    @if ($assets->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro de série</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assets as $asset)
                    <tr>
                        <td>{{ $asset->name }}</td>
                        <td>{{ $asset->serial_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun asset trouvé dans cette catégorie.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">← Retour aux catégories</a>
</div>
@endsection
