@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Gestión de Clientes</h3>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Cliente
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">Cliente / Empresa</th>
                        <th>Contacto</th>
                        <th>Estado</th>
                        <th class="text-end pe-4">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center me-3" style="width: 40px; height: 40px; font-weight:bold;">
                                    {{ substr($cliente->nombre, 0, 2) }}
                                </div>
                                <div>
                                    <div class="fw-bold">{{ $cliente->nombre }}</div>
                                    <div class="small text-muted">{{ $cliente->empresa ?? 'Particular' }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div><i class="bi bi-envelope me-1 text-muted"></i> {{ $cliente->email }}</div>
                            <div class="small text-muted"><i class="bi bi-phone me-1"></i> {{ $cliente->telefono ?? 'Sin teléfono' }}</div>
                        </td>
                        <td>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Activo</span>
                        </td>
                        <td class="text-end pe-4">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-outline-secondary border-0" title="Ver detalles">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-outline-primary border-0" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar a este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            No hay clientes registrados todavía.
                        </td>
                    </tr>
                    @endforelse
                    </tbody>
            </table>
        </div>
        
        @if($clientes instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="card-footer bg-white py-3">
            {{ $clientes->links() }}
        </div>
        @endif
    </div>
</div>
@endsection