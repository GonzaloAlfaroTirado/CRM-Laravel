@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Listado de Productos</h2>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('productos.index') }}" method="GET" class="d-flex gap-2">
                <input type="text" name="buscar" class="form-control" 
                       placeholder="Buscar producto por nombre..." 
                       value="{{ request('buscar') }}">
                
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
                
                @if(request('buscar'))
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                @endif
            </form>
        </div>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th> 
                        <th>Proveedor</th> 
                        <th>Precio</th>
                        <th>Stock</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td><strong>{{ $producto->nombre }}</strong></td>
                        
                        <td>
                            <span class="badge bg-info text-dark">
                                {{ $producto->categoria->nombre ?? 'Sin Asignar' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $producto->proveedor->nombre_empresa ?? 'Sin Asignar' }}
                            </span>
                        </td>

                        <td>${{ number_format($producto->precio, 2) }}</td>
                        
                        <td class="{{ $producto->stock < 10 ? 'text-danger fw-bold' : '' }}">
                            {{ $producto->stock }}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>
                            
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            No hay productos registrados (o no coinciden con la búsqueda).
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <div class="d-flex justify-content-center mt-4">
                    {{ $productos->appends(['buscar' => request('buscar')])->links() }}
                </div>
            </table>
        </div>
    </div>
</div>
@endsection