@extends('layouts')

@section('content')
<div class="container">
    <h2>Edit Maintenance Record</h2>

    <form action="{{ route('maintenance.update', $Maintenance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="technician_id">Technician</label>
            <select name="technician_id" class="form-control" required>
                <option value="">-- Select Technician --</option>
                @foreach($technicians as $tech)
                    <option value="{{ $tech->id }}" 
                        {{ $Maintenance->technician_id == $tech->id ? 'selected' : '' }}>
                        {{ $tech->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $Maintenance->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="cost">Cost</label>
            <input type="number" name="cost" class="form-control" 
                   value="{{ $Maintenance->cost }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('maintenance.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
