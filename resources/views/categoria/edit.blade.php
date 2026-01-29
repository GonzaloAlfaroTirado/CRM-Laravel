@extends('layout')

@section('content')
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" value="{{ $categoria->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Actualizar</button>
    </form>
@endsection