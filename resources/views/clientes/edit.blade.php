@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-pencil-fill me-2 text-warning"></i>Editar Cliente</h3>
        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Volver
        </a>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
                </div>
            @endif

            <form action="{{ route('clientes.update', $cliente) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nombre *</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                               value="{{ old('nombre', $cliente->nombre) }}">
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Empresa</label>
                        <input type="text" name="empresa" class="form-control" value="{{ old('empresa', $cliente->empresa) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $cliente->email) }}">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Teléfono</label>
                        <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Dirección</label>
                        <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Foto del cliente</label>
                        @if($cliente->foto)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $cliente->foto) }}" alt="Foto actual"
                                     style="width:70px;height:70px;object-fit:cover;border-radius:50%;">
                                <span class="small text-muted ms-2">Foto actual</span>
                            </div>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror"
                               accept="image/*" id="fotoInput">
                        <div class="form-text">Sube una nueva foto para reemplazar la actual. JPG, PNG o WEBP, máx 2 MB.</div>
                        @error('foto')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="fotoPreview" class="mt-2"></div>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save me-1"></i> Actualizar Cliente
                    </button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('fotoInput').addEventListener('change', function(e){
    const preview = document.getElementById('fotoPreview');
    preview.innerHTML = '';
    if(e.target.files[0]){
        const img = document.createElement('img');
        img.src = URL.createObjectURL(e.target.files[0]);
        img.style = 'width:80px;height:80px;object-fit:cover;border-radius:50%;';
        preview.appendChild(img);
    }
});
</script>
@endpush
