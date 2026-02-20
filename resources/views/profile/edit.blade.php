@extends('layout')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4">Configuración de Perfil</h3>

    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Editar Información</p>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nombre de Usuario</strong></label>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Correo Electrónico</strong></label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                </div>

                <hr>
                <p class="text-muted text-xs">Deja los campos de contraseña vacíos si no deseas cambiarla.</p>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nueva Contraseña</strong></label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Confirmar Contraseña</strong></label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                </div>

                <div class="mb-3 text-end">
                    <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    <button class="btn btn-primary btn-sm" type="submit">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection