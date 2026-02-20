@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-person-badge-fill me-2 text-primary"></i>Gestión de Empleados</h3>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Empleado
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="bg-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Cargo</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($empleados as $empleado)
                    <tr>
                        <td><strong>{{ $empleado->nombre }}</strong></td>
                        <td><span class="badge bg-info text-dark">{{ $empleado->cargo ?? '—' }}</span></td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->telefono ?? '—' }}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('empleados.edit', $empleado) }}"
                                   class="btn btn-sm btn-outline-primary border-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if(Auth::user()->isAdmin())
                                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar empleado?')">
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
                    <tr><td colspan="5" class="text-center text-muted py-4">No hay empleados.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">{{ $empleados->links() }}</div>
        </div>
    </div>
</div>
@endsection