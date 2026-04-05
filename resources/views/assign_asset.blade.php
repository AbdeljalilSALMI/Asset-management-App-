@extends('layouts')

@section('content')
<div class="container py-4">
    <h1>Assets </h1>
     @if ($assignedAssets->isNotEmpty())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Numéro de série</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($assignedAssets as $ass)
                    <tr>
                        <td>{{ $ass->asset->name }}</td>
                        <td>{{ $ass->asset->serial_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun équipement assigné.</p>
    @endif
    <h2>Assigner un Asset à {{ $employee->name }}</h2>

    <form action="{{ route('employees.assign.asset', $employee->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="asset_id">Choisir un équipement disponible :</label>
            <select name="asset_id" id="asset_id" class="form-control" required>
                @foreach($assets as $asset)
                    <option value="{{ $asset->id }}">{{ $asset->name }} ({{ $asset->serial_number }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Assigner</button>
    </form>
</div>
<style>
   
    .container {

        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }

</style>
@endsection