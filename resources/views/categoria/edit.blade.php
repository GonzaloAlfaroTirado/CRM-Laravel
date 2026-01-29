@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-header bg-white py-3">
                 <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Editar Categoría</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" value="{{ $categoria->nombre }}" class="form-control" id="floatingNombre" placeholder="Nombre" required>
                        <label for="floatingNombre">Nombre de Categoría</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea name="descripcion" class="form-control" id="floatingDesc" style="height: 100px" placeholder="Desc">{{ $categoria->descripcion }}</textarea>
                        <label for="floatingDesc">Descripción (Opcional)</label>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                         <a href="{{ route('categorias.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-warning btn-lg px-4">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection