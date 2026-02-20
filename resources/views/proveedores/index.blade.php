@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-truck-front-fill me-2 text-primary"></i>Gestión de Proveedores</h3>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Proveedor
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th>Empresa</th>
                        <th>Contacto</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $proveedor)
                    <tr>
                        <td><strong>{{ $proveedor->nombre_empresa }}</strong></td>
                        <td>{{ $proveedor->contacto_nombre }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->telefono ?? '—' }}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('proveedores.edit', $proveedor) }}"
                                   class="btn btn-sm btn-outline-primary border-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if(Auth::user()->isAdmin())
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar proveedor?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">No hay proveedores.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">{{ $proveedores->links() }}</div>
        </div>
    </div>
</div>
@endsection