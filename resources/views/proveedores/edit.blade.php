@extends('layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-sm mb-4 border-0">
            <div class="card-header bg-white py-3">
                 <h5 class="m-0 font-weight-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Editar Proveedor</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="nombre_empresa" value="{{ $proveedor->nombre_empresa }}" class="form-control" id="floatingEmpresa" placeholder="Empresa" required>
                        <label for="floatingEmpresa">Nombre de la Empresa</label>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" name="contacto_nombre" value="{{ $proveedor->contacto_nombre }}" class="form-control" id="floatingContacto" placeholder="Contacto" required>
                                <label for="floatingContacto">Nombre del Contacto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="email" name="email" value="{{ $proveedor->email }}" class="form-control" id="floatingEmail" placeholder="Email" required>
                                <label for="floatingEmail">Email Corporativo</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                         <a href="{{ route('proveedores.index') }}" class="btn btn-secondary me-md-2">Cancelar</a>
                        <button type="submit" class="btn btn-warning btn-lg px-4">Actualizar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection