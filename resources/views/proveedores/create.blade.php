@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Nuevo Proveedor</h3>
        <a href="{{ route('proveedores.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Nombre Empresa</label>
                        <input type="text" name="nombre_empresa" class="form-control form-control-lg" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-bold text-muted small text-uppercase">Nombre Contacto</label>
                        <input type="text" name="contacto_nombre" class="form-control form-control-lg" required>
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
                    <button type="submit" class="btn btn-info text-white btn-lg">Guardar Proveedor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection