@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark fw-bold">Configuración de Seguridad</h3>
                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary border-0">
                    <i class="bi bi-arrow-left me-1"></i> Volver al Perfil
                </a>
            </div>

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 fw-bold text-primary"><i class="bi bi-shield-lock me-2"></i>Cambiar Contraseña</h6>
                </div>
                <div class="card-body p-4">
                    
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center mb-4 border-0 bg-success bg-opacity-10 text-success" role="alert">
                            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                            <div>{{ session('success') }}</div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Contraseña Actual</label>
                            <input type="password" name="current_password" class="form-control form-control-lg bg-light border-0" placeholder="••••••••" required>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted small text-uppercase">Nueva Contraseña</label>
                                <input type="password" name="new_password" class="form-control form-control-lg bg-light border-0" required>
                                <div class="form-text">Mínimo 8 caracteres.</div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-muted small text-uppercase">Confirmar Nueva</label>
                                <input type="password" name="new_password_confirmation" class="form-control form-control-lg bg-light border-0" required>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-3 mt-4 border-start border-4 border-danger">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="fw-bold text-danger mb-1">Zona de Peligro</h6>
                        <small class="text-muted">Desactivar temporalmente esta cuenta.</small>
                    </div>
                    <button class="btn btn-outline-danger btn-sm" disabled>Desactivar Cuenta</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection