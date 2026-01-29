@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-header bg-white py-3">
                 <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Editar Empleado</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre" value="{{ $empleado->nombre }}" class="form-control" id="floatingNombre" placeholder="Nombre" required>
                        <label for="floatingNombre">Nombre Completo</label>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="puesto" value="{{ $empleado->puesto }}" class="form-control" id="floatingPuesto" placeholder="Puesto" required>
                                <label for="floatingPuesto">Cargo / Puesto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="number" step="0.01" name="salario" value="{{ $empleado->salario }}" class="form-control" id="floatingSalario" placeholder="0" required>
                                <label for="floatingSalario">Salario Mensual ($)</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                         <a href="{{ route('empleados.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-warning btn-lg px-4">Actualizar Ficha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection