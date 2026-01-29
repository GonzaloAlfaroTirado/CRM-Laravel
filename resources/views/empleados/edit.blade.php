@extends('layout')

@section('content')
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nombre Completo</label>
            <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Puesto</label>
            <input type="text" name="puesto" value="{{ $empleado->puesto }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Salario</label>
            <input type="number" step="0.01" name="salario" value="{{ $empleado->salario }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection