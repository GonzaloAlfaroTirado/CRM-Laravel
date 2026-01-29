@extends('layout')
@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Nuevo Proveedor</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3"><input type="text" name="nombre_empresa" class="form-control" id="ne" required><label for="ne">Empresa</label></div>
            <div class="form-floating mb-3"><input type="text" name="contacto_nombre" class="form-control" id="nc" required><label for="nc">Nombre Contacto</label></div>
            <div class="form-floating mb-3"><input type="email" name="email" class="form-control" id="em" required><label for="em">Email</label></div>
            <button type="submit" class="btn btn-success w-100">Guardar</button>
        </form>
    </div>
</div>
@endsection