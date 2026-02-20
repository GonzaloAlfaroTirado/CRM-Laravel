@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-box-seam-fill me-2 text-primary"></i>Listado de Productos</h3>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Producto
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>PDF</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                    <tr>
                        <td>
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="img"
                                     style="width:45px;height:45px;object-fit:cover;border-radius:8px;">
                            @else
                                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded"
                                     style="width:45px;height:45px;font-size:20px;">
                                    <i class="bi bi-image"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $producto->nombre }}</strong>
                            @if($producto->descripcion)
                                <div class="small text-muted">{{ Str::limit($producto->descripcion, 40) }}</div>
                            @endif
                        </td>
                        <td><span class="badge bg-info text-dark">{{ $producto->categoria->nombre ?? '—' }}</span></td>
                        <td><span class="badge bg-secondary">{{ $producto->proveedor->nombre_empresa ?? '—' }}</span></td>
                        <td>€{{ number_format($producto->precio, 2) }}</td>
                        <td class="{{ $producto->stock < 10 ? 'text-danger fw-bold' : '' }}">
                            {{ $producto->stock }}
                            @if($producto->stock < 10)
                                <i class="bi bi-exclamation-triangle-fill text-warning ms-1"></i>
                            @endif
                        </td>
                        <td>
                            @if($producto->pdf)
                                <a href="{{ asset('storage/' . $producto->pdf) }}" target="_blank"
                                   class="btn btn-sm btn-outline-danger border-0">
                                    <i class="bi bi-file-earmark-pdf-fill fs-5"></i>
                                </a>
                            @else
                                <span class="text-muted small">—</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('productos.edit', $producto->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if(Auth::user()->isAdmin())
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                      class="d-inline" onsubmit="return confirm('¿Eliminar {{ $producto->nombre }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>No hay productos registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $productos->links() }}
            </div>
        </div>
    </div>
</div>
@endsection