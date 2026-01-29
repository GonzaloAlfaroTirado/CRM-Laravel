@extends('layout')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between bg-white">
        <h5 class="m-0 font-weight-bold text-primary">Productos</h5>
        <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm btn-icon-split shadow-sm"><span class="icon text-white-50"><i class="bi bi-plus-lg"></i></span><span class="text">Nuevo</span></a>
    </div>
    <div class="card-body">
        <table class="table table-hover align-middle">
            <thead><tr><th>Producto</th><th>Precio</th><th>Stock</th><th class="text-center">Acciones</th></tr></thead>
            <tbody>
                @foreach($productos as $p)
                <tr>
                    <td class="fw-bold">{{ $p->nombre }}</td><td class="text-success fw-bold">${{ $p->precio }}</td>
                    <td><span class="badge {{ $p->stock < 10 ? 'bg-danger' : 'bg-success' }}">{{ $p->stock }}</span></td>
                    <td class="text-center">
                        <a href="{{ route('productos.edit', $p->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('productos.destroy', $p->id) }}" method="POST" style="display:inline">@csrf @method('DELETE')<button class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?')"><i class="bi bi-trash-fill"></i></button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection