@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col">
            <h3 class="text-dark fw-bold">Mi Perfil</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4 col-md-5 mb-4">
            <div class="card shadow-sm border-0 rounded-3 text-center py-5 h-100">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="d-inline-block p-3 rounded-circle bg-primary bg-opacity-10">
                            <i class="bi bi-person-circle text-primary" style="font-size: 5rem;"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">{{ Auth::user()->name }}</h4>
                    <p class="text-muted mb-4">Administrador del Sistema</p>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('profile.settings') }}" class="btn btn-primary px-4">
                            <i class="bi bi-gear-fill me-2"></i>Editar
                        </a>
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-share"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-md-7 mb-4">
            <div class="card shadow-sm border-0 rounded-3 h-100">
                <div class="card-header bg-white py-3 border-0">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-person-badge me-2"></i>Información de la Cuenta</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item border-0 px-0 mb-3">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1">Nombre Completo</small>
                            <span class="fs-5">{{ Auth::user()->name }}</span>
                        </li>
                        <li class="list-group-item border-0 px-0 mb-3">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1">Correo Electrónico</small>
                            <span class="fs-5">{{ Auth::user()->email }}</span>
                        </li>
                        <li class="list-group-item border-0 px-0 mb-3">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1">Fecha de Registro</small>
                            <span class="fs-5">{{ Auth::user()->created_at->format('d/m/Y') }}</span>
                        </li>
                        <li class="list-group-item border-0 px-0">
                            <small class="text-muted d-block text-uppercase fw-bold mb-1">Estado de la cuenta</small>
                            <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">Activa</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection