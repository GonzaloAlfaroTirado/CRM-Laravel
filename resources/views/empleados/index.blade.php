@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Equipo de Trabajo</h3>
        <a href="{{ route('empleados.create') }}" class="btn btn-dark">
            <i class="bi bi-plus-lg me-1"></i> Nuevo Empleado
        </a>
    </div>

    <div class="row">
        @forelse($empleados as $empleado)
        <div class="col-md-4 col-xl-3 mb-4">
            <div class="card shadow-sm border-0 h-100 text-center py-4">
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-center">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                            {{ substr($empleado->nombre, 0, 1) }}
                        </div>
                    </div>
                    <h5 class="fw-bold mb-1">{{ $empleado->nombre }}</h5>
                    <p class="text-muted mb-3">{{ $empleado->email }}</p>
                    <span class="badge bg-primary bg-opacity-10 text-primary mb-3">{{ $empleado->cargo ?? 'Empleado' }}</span>
                    
                    <div class="d-flex gap-2 justify-content-center mt-2">
                        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                        
                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" onsubmit="return confirm('¿Eliminar empleado?');">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">No hay empleados registrados.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection