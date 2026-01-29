@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Control</h1>
        <span class="d-none d-sm-inline-block text-muted">Bienvenido al CRM Alfaro</span>
    </div>

    <div class="row">
        
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2 hover-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Gestión Comercial</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">Clientes</div>
                            <p class="mt-2 small text-muted">Administra tu cartera de clientes y contactos.</p>
                            <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark btn-sm stretched-link mt-2">Ir a Clientes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 hover-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Inventario</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">Productos</div>
                            <p class="mt-2 small text-muted">Control de stock, precios y disponibilidad.</p>
                            <a href="{{ route('productos.index') }}" class="btn btn-outline-dark btn-sm stretched-link mt-2">Ver Catálogo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2 hover-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Logística</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">Proveedores</div>
                            <p class="mt-2 small text-muted">Gestión de empresas suministradoras.</p>
                            <a href="{{ route('proveedores.index') }}" class="btn btn-outline-dark btn-sm stretched-link mt-2">Ver Proveedores</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 hover-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Recursos Humanos</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">Empleados</div>
                            <a href="{{ route('empleados.index') }}" class="btn btn-outline-dark btn-sm stretched-link mt-2">Gestionar Personal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 hover-card">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Configuración</div>
                            <div class="h5 mb-0 font-weight-bold text-dark">Categorías</div>
                            <a href="{{ route('categorias.index') }}" class="btn btn-outline-dark btn-sm stretched-link mt-2">Ver Categorías</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection