@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between bg-white">
        <h5 class="m-0 font-weight-bold text-primary">Empleados</h5>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="bi bi-plus-lg"></i></span><span class="text">Contratar</span></a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead><tr><th>Nombre</th><th>Puesto</th><th>Salario</th><th class="text-center">Acciones</th></tr></thead>
            <tbody>
                @foreach($empleados as $e)
                <tr>
                    <td class="fw-bold">{{ $e->nombre }}</td><td><span class="badge bg-info text-dark">{{ $e->puesto }}</span></td><td>${{ $e->salario }}</td>
                    <td class="text-center">
                        <a href="{{ route('empleados.edit', $e->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('empleados.destroy', $e->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" onclick="return confirm('¿Despedir?')"><i class="bi bi-trash-fill"></i></button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection