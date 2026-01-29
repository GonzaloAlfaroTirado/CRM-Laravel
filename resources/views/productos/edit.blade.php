@extends('layout')
@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Editar Producto</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-floating mb-3"><input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" id="n" required><label for="n">Nombre</label></div>
            <div class="row">
                <div class="col-md-6"><div class="form-floating mb-3"><input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="form-control" id="p" required><label for="p">Precio</label></div></div>
                <div class="col-md-6"><div class="form-floating mb-3"><input type="number" name="stock" value="{{ $producto->stock }}" class="form-control" id="s" required><label for="s">Stock</label></div></div>
            </div>
            <button type="submit" class="btn btn-warning w-100">Actualizar</button>
        </form>
    </div>
</div>
@endsection