@extends('layout')

@section('content')
    <h1>Nuevo Empleado</h1>
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre Completo</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Puesto</label>
            <input type="text" name="puesto" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Salario</label>
            <input type="number" step="0.01" name="salario" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection