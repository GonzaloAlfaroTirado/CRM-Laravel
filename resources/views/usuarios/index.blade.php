@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-shield-person-fill me-2 text-danger"></i>Gestión de Usuarios & Roles</h3>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Usuario
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Creado</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>
                            <i class="bi bi-person-circle me-1 text-primary"></i>
                            <strong>{{ $usuario->name }}</strong>
                            @if($usuario->id === Auth::id())
                                <span class="badge bg-light text-secondary ms-1">Tú</span>
                            @endif
                        </td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                            @if($usuario->role === 'admin')
                                <span class="badge bg-danger"><i class="bi bi-shield-fill me-1"></i>Admin</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-person-fill me-1"></i>Usuario</span>
                            @endif
                        </td>
                        <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('usuarios.edit', $usuario) }}"
                                   class="btn btn-sm btn-outline-primary border-0">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @if($usuario->id !== Auth::id())
                                <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar al usuario {{ $usuario->name }}?')">
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
                    <tr><td colspan="6" class="text-center text-muted py-4">No hay usuarios.</td></tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">{{ $usuarios->links() }}</div>
        </div>
    </div>
</div>
@endsection