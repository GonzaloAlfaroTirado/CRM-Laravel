@extends('layout')

@section('content')
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nombre Empresa</label>
            <input type="text" name="nombre_empresa" value="{{ $proveedor->nombre_empresa }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nombre de Contacto</label>
            <input type="text" name="contacto_nombre" value="{{ $proveedor->contacto_nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $proveedor->email }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection