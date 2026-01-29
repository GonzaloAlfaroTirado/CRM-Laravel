@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between bg-white">
        <h5 class="m-0 font-weight-bold text-primary">Proveedores</h5>
        <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="bi bi-plus-lg"></i></span><span class="text">Nuevo</span></a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead><tr><th>Empresa</th><th>Contacto</th><th>Email</th><th class="text-center">Acciones</th></tr></thead>
            <tbody>
                @foreach($proveedores as $p)
                <tr>
                    <td class="fw-bold">{{ $p->nombre_empresa }}</td><td>{{ $p->contacto_nombre }}</td><td>{{ $p->email }}</td>
                    <td class="text-center">
                        <a href="{{ route('proveedores.edit', $p->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('proveedores.destroy', $p->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?')"><i class="bi bi-trash-fill"></i></button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection