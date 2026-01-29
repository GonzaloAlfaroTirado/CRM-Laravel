@extends('layout')
@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Nuevo Cliente</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('clientes.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3"><input type="text" name="nombre" class="form-control" id="n" placeholder="N" required><label for="n">Nombre Completo</label></div>
            <div class="form-floating mb-3"><input type="email" name="email" class="form-control" id="e" placeholder="E" required><label for="e">Email</label></div>
            <div class="form-floating mb-3"><input type="text" name="telefono" class="form-control" id="t" placeholder="T"><label for="t">Teléfono</label></div>
            <div class="form-floating mb-3"><input type="text" name="direccion" class="form-control" id="d" placeholder="D"><label for="d">Dirección</label></div>
            <button type="submit" class="btn btn-success w-100">Guardar</button>
        </form>
    </div>
</div>
@endsection