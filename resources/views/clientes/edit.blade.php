@extends('layout')

@section('content')
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $cliente->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection