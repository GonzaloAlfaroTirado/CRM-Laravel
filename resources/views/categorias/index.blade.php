@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark fw-bold">Categorías de Productos</h3>
                <a href="{{ route('categorias.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-1"></i> Nueva Categoría
                </a>
            </div>

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">Nombre</th>
                                <th>Descripción</th>
                                <th class="text-end pe-4">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categorias as $categoria)
                            <tr>
                                <td class="ps-4 fw-bold">
                                    <i class="bi bi-tag me-2 text-muted"></i> {{ $categoria->nombre }}
                                </td>
                                <td class="text-muted">{{ $categoria->descripcion ?? '-' }}</td>
                                <td class="text-end pe-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-light text-primary"><i class="bi bi-pencil"></i></a>
                                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" onsubmit="return confirm('¿Borrar categoría?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-light text-danger"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="text-center py-4">No hay categorías.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection