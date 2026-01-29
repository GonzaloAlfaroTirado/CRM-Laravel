@extends('layout')
@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Editar Cliente</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-floating mb-3"><input type="text" name="nombre" value="{{ $cliente->nombre }}" class="form-control" id="n" required><label for="n">Nombre</label></div>
            <div class="form-floating mb-3"><input type="email" name="email" value="{{ $cliente->email }}" class="form-control" id="e" required><label for="e">Email</label></div>
            <div class="form-floating mb-3"><input type="text" name="telefono" value="{{ $cliente->telefono }}" class="form-control" id="t"><label for="t">Teléfono</label></div>
            <div class="form-floating mb-3"><input type="text" name="direccion" value="{{ $cliente->direccion }}" class="form-control" id="d"><label for="d">Dirección</label></div>
            <button type="submit" class="btn btn-warning w-100">Actualizar</button>
        </form>
    </div>
</div>
@endsection