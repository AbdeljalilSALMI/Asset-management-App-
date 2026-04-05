@extends('layouts')

@section('content')
<div class="container pt-4">
    <h2>employés de departement: {{ $department->name }}</h2>

    @if ($department->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>function</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->function }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucun employee trouvé dans ce departement.</p>
    @endif

    <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">← Retour aux departements</a>
</div>
@endsection
