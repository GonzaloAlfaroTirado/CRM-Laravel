@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark fw-bold">Ficha de Cliente</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Volver</a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6 border-end">
                    <h5 class="fw-bold text-primary mb-4">Datos Personales</h5>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">NOMBRE</label>
                        <div class="fs-5">{{ $cliente->nombre }}</div>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">EMPRESA</label>
                        <div class="fs-5">{{ $cliente->empresa ?? 'Particular' }}</div>
                    </div>
                </div>
                <div class="col-md-6 ps-md-4">
                    <h5 class="fw-bold text-primary mb-4">Contacto</h5>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">EMAIL</label>
                        <div class="fs-5"><a href="mailto:{{ $cliente->email }}" class="text-decoration-none">{{ $cliente->email }}</a></div>
                    </div>
                    <div class="mb-3">
                        <label class="small text-muted fw-bold">TELÉFONO</label>
                        <div class="fs-5">{{ $cliente->telefono ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="mt-4 pt-3 border-top text-end">
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-primary">Editar Cliente</a>
            </div>
        </div>
    </div>
</div>
@endsection