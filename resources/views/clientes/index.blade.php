@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white">
        <h5 class="m-0 font-weight-bold text-primary">Clientes</h5>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="bi bi-plus-lg"></i></span><span class="text">Nuevo</span></a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead><tr><th>Nombre</th><th>Email</th><th>Teléfono</th><th class="text-center">Acciones</th></tr></thead>
            <tbody>
                @foreach($clientes as $c)
                <tr>
                    <td class="fw-bold">{{ $c->nombre }}</td><td>{{ $c->email }}</td><td>{{ $c->telefono }}</td>
                    <td class="text-center">
                        <a href="{{ route('clientes.edit', $c->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('clientes.destroy', $c->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?')"><i class="bi bi-trash-fill"></i></button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection