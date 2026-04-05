@extends('layouts')

@section('content')
<div class="container pt-4">
    <h2><svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#07391fff"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg> modifier un employee</h2>
    <form action="{{ route('employees.update',$employee) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="name" class="form-control"value={{ $employee->name }} required>
        </div>
        <div class="mb-3">
            <label>Fonction</label>
            <input type="text" name="function" class="form-control" value="{{ $employee->function }}" required>
        </div>
        <div class="mb-3">
            <label>Département</label>
            <select name="department_id" class="form-control"  required>
            
                
                @foreach($departments as $department)
                    <option value="{{ $department->id }}"{{ $department->id ==$employee->department_id ? 'selected ' : '' }} >
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ $employee->user->email }}" required>
</div>
<div class="mb-3">
    <label>Mot de passe (laisser vide si inchangé)</label>
    <input type="password" name="password" class="form-control">
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