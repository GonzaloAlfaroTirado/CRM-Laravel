@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Nuevo Cliente</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Empresa</label>
                        <input type="text" name="empresa" class="form-control form-control-lg">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Teléfono</label>
                        <input type="text" name="telefono" class="form-control">
                    </div>
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar Cliente</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection