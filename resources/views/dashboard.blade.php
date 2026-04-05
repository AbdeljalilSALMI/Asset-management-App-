@extends('layouts')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"> Tableau de bord des actifs informatiques</h2>
    
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5>Total Assets</h5>
                    <h3>{{ $totalAssets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5>Assets Disponibles</h5>
                    <h3>{{ $availableAssets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body">
                    <h5>Assets Assignés</h5>
                    <h3>{{ $assignedAssets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body">
                    <h5>En Maintenance</h5>
                    <h3>{{ $maintenanceAssets }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-dark shadow">
                <div class="card-body">
                    <h5>Total Employés</h5>
                    <h3>{{ $totalEmployees }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info shadow">
                <div class="card-body">
                    <h5>Catégories</h5>
                    <h3>{{ $totalCategories }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .container {

        background: linear-gradient(135deg, #0d733bff, #020d31ff);
    }
</style>

@endsection
