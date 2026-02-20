@extends('layout')

@section('content')
<div class="container-fluid">
    <h3 class="text-dark mb-4 fw-bold">Panel de Control</h3>
    
    <div class="row g-4 mb-4">
        
        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 py-2 border-start border-4 border-primary rounded-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">Equipo (Empleados)</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalEmpleados }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-people-fill text-gray-300 fs-1 text-primary opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 py-2 border-start border-4 border-success rounded-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">Valor Inventario</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">${{ number_format($valorInventario, 2) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-currency-dollar text-gray-300 fs-1 text-success opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 py-2 border-start border-4 border-info rounded-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">Proveedores Activos</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $totalProveedores }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-truck text-gray-300 fs-1 text-info opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card border-0 shadow-sm h-100 py-2 border-start border-4 border-warning rounded-3">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">Alerta Stock Bajo</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ $stockBajo }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle-fill text-gray-300 fs-1 text-warning opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-5 text-center">
            <div class="mb-3">
                <i class="bi bi-building text-secondary" style="font-size: 4rem;"></i>
            </div>
            
            <h2 class="fw-light">¡Bienvenido de nuevo, <span class="fw-bold text-primary">{{ Auth::user()->name ?? 'Usuario' }}</span>!</h2>
            <p class="lead text-muted">Aquí tienes un resumen rápido del estado de tu empresa.</p>
            
            <div class="mt-4">
                <a href="{{ route('productos.create') }}" class="btn btn-primary me-2"><i class="bi bi-box-seam me-1"></i> Agregar Producto</a>
                <a href="{{ route('empleados.create') }}" class="btn btn-outline-dark"><i class="bi bi-person-plus me-1"></i> Nuevo Empleado</a>
            </div>
        </div>
    </div>
</div>
@endsection