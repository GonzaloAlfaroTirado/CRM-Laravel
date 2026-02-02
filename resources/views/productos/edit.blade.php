@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Editar Producto: {{ $producto->nombre }}</h4>
        </div>
        <div class="card-body">
            
            <form action="{{ route('productos.update', $producto->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre del Producto</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="{{ old('precio', $producto->precio) }}" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" name="stock" class="form-control" value="{{ old('stock', $producto->stock) }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="categoria_id" class="form-label">Categoría</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="proveedor_id" class="form-label">Proveedor</label>
                        <select name="proveedor_id" class="form-select" required>
                            <option value="">-- Selecciona un proveedor --</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" 
                                    {{ old('proveedor_id', $producto->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection