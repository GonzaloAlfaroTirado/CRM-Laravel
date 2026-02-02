@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Nuevo Producto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="categoria_id" class="form-label">Categoría</label>
                    <select name="categoria_id" class="form-select" required>
                        <option value="">-- Selecciona una Categoría --</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                    @if($categorias->isEmpty())
                        <small class="text-danger">⚠ No hay categorías creadas.</small>
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label for="proveedor_id" class="form-label">Proveedor</label>
                    <select name="proveedor_id" class="form-select" required>
                        <option value="">-- Selecciona un Proveedor --</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre_empresa }}</option>
                        @endforeach
                    </select>
                    @if($proveedores->isEmpty())
                        <small class="text-danger">⚠ No hay proveedores creados.</small>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="precio" class="form-label">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio') }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stock Inicial</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar Producto</button>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection