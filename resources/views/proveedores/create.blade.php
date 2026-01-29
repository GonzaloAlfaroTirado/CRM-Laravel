@extends('layout')

@section('content')
    <h1>Nuevo Proveedor</h1>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre Empresa</label>
            <input type="text" name="nombre_empresa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre de Contacto</label>
            <input type="text" name="contacto_nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection