@extends('layout')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark fw-bold mb-4">Editar Proveedor</h3>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="mb-3">
                    <label for="nombre_empresa" class="form-label">Nombre de la Empresa</label>
                    <input type="text" name="nombre_empresa" class="form-control" 
                           value="{{ old('nombre_empresa', $proveedor->nombre_empresa) }}" required>
                </div>

                <div class="mb-3">
                    <label for="contacto_nombre" class="form-label">Nombre del Contacto</label>
                    <input type="text" name="contacto_nombre" class="form-control" 
                           value="{{ old('contacto_nombre', $proveedor->contacto_nombre) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="{{ old('email', $proveedor->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" 
                           value="{{ old('telefono', $proveedor->telefono) }}">
                </div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection