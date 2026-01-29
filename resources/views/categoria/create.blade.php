@extends('layout')
@section('content')
<div class="card shadow-sm col-md-6 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Nueva Categoría</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3"><input type="text" name="nombre" class="form-control" id="n" required><label for="n">Nombre</label></div>
            <div class="form-floating mb-3"><textarea name="descripcion" class="form-control" id="d" style="height:100px"></textarea><label for="d">Descripción</label></div>
            <button type="submit" class="btn btn-success w-100">Guardar</button>
        </form>
    </div>
</div>
@endsection