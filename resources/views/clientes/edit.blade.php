@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Editar Cliente</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $cliente->nombre) }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Empresa</label>
                        <input type="text" name="empresa" class="form-control form-control-lg" value="{{ old('empresa', $cliente->empresa) }}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}">
                    </div>
                </div>

                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection