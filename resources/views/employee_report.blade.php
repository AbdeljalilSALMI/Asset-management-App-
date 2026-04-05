@extends('layout_employee')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0"> Signaler un problème pour <span class="fw-bold">{{ $asset->name }}</span></h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('employee.report.store', $asset->id) }}">
                @csrf

                <!-- Description du problème -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Description du problème :</label>
                    <textarea id="description" name="description" 
                              class="form-control" rows="4" required 
                              placeholder="Décrivez le problème rencontré avec cet équipement..."></textarea>
                </div>

                <!-- Bouton -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4">
                         Soumettre le rapport
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
