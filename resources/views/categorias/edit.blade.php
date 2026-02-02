@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="text-dark fw-bold">Editar Categoría</h3>
                <a href="{{ route('categorias.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-1"></i> Volver</a>
            </div>

            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Nombre Categoría</label>
                            <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $categoria->nombre) }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small text-uppercase">Descripción</label>
                            <textarea name="descripcion" class="form-control" rows="3">{{ old('descripcion', $categoria->descripcion) }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Actualizar Categoría</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection