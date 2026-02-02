@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Directorio de Proveedores</h3>
        <a href="{{ route('proveedores.create') }}" class="btn btn-info text-white">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Proveedor
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Empresa / Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $proveedor)
                    <tr>
                        <td class="ps-4">
                            <div class="fw-bold">{{ $proveedor->nombre_empresa }}</div>
                            <small class="text-muted">{{ $proveedor->contacto_nombre }}</small>
                        </td>
                        <td>
                            <a href="mailto:{{ $proveedor->email }}" class="text-decoration-none">{{ $proveedor->email }}</a>
                        </td>
                        <td>{{ $proveedor->telefono ?? '-' }}</td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-outline-primary border-0"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" onsubmit="return confirm('¿Eliminar proveedor?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0"><i class="bi bi-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center py-4">No hay proveedores registrados.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection