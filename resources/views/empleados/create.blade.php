@extends('layout')
@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3"><h5 class="m-0 font-weight-bold text-primary">Nuevo Empleado</h5></div>
    <div class="card-body p-4">
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf
            <div class="form-floating mb-3"><input type="text" name="nombre" class="form-control" id="n" required><label for="n">Nombre Completo</label></div>
            <div class="row">
                <div class="col-md-6"><div class="form-floating mb-3"><input type="text" name="puesto" class="form-control" id="p" required><label for="p">Puesto</label></div></div>
                <div class="col-md-6"><div class="form-floating mb-3"><input type="number" step="0.01" name="salario" class="form-control" id="s" required><label for="s">Salario</label></div></div>
            </div>
            <button type="submit" class="btn btn-success w-100">Guardar</button>
        </form>
    </div>
</div>
@endsection