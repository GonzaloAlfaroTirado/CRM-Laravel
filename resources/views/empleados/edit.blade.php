@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Editar Empleado</h3>
        <a href="{{ route('empleados.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('empleados.update', $empleado) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $empleado->nombre) }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Cargo</label>
                        <input type="text" name="cargo" class="form-control form-control-lg" value="{{ old('cargo', $empleado->cargo) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $empleado->email) }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Departamento</label>
                        <select name="departamento" class="form-select">
                            <option value="Ventas" {{ old('departamento', $empleado->departamento) == 'Ventas' ? 'selected' : '' }}>Ventas</option>
                            <option value="IT" {{ old('departamento', $empleado->departamento) == 'IT' ? 'selected' : '' }}>IT / Sistemas</option>
                            <option value="RRHH" {{ old('departamento', $empleado->departamento) == 'RRHH' ? 'selected' : '' }}>Recursos Humanos</option>
                            <option value="Admin" {{ old('departamento', $empleado->departamento) == 'Admin' ? 'selected' : '' }}>Administración</option>
                        </select>
                    </div>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-dark btn-lg">Actualizar Empleado</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection