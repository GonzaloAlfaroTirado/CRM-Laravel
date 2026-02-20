@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold"><i class="bi bi-people-fill me-2 text-primary"></i>Gestión de Clientes</h3>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Cliente
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th>Foto</th>
                        <th>Cliente / Empresa</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                    <tr>
                        <td>
                            @if($cliente->foto)
                                <img src="{{ asset('storage/' . $cliente->foto) }}"
                                     alt="Foto" class="rounded-circle"
                                     style="width:45px;height:45px;object-fit:cover;">
                            @else
                                <div class="bg-primary text-white rounded-circle d-flex justify-content-center align-items-center fw-bold"
                                     style="width:45px;height:45px;">
                                    {{ strtoupper(substr($cliente->nombre, 0, 2)) }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $cliente->nombre }}</div>
                            <div class="small text-muted">{{ $cliente->empresa ?? 'Particular' }}</div>
                        </td>
                        <td><i class="bi bi-envelope me-1 text-muted"></i>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono ?? '—' }}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('clientes.show', $cliente) }}"
                                   class="btn btn-sm btn-outline-secondary border-0" title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('clientes.edit', $cliente) }}"
                                   class="btn btn-sm btn-outline-primary border-0" title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if(Auth::user()->isAdmin())
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar a {{ $cliente->nombre }}?')">
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
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>No hay clientes registrados.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection