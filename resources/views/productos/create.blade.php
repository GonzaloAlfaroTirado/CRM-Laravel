@extends('layout')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold"><i class="bi bi-plus-square-fill me-2 text-primary"></i>Nuevo Producto</h3>
        <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
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

            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nombre *</label>
                        <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                               value="{{ old('nombre') }}" placeholder="Nombre del producto">
                        @error('nombre')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Precio (€) *</label>
                        <input type="number" step="0.01" name="precio"
                               class="form-control @error('precio') is-invalid @enderror"
                               value="{{ old('precio') }}">
                        @error('precio')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Stock *</label>
                        <input type="number" name="stock"
                               class="form-control @error('stock') is-invalid @enderror"
                               value="{{ old('stock') }}">
                        @error('stock')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-semibold">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="3"
                                  placeholder="Descripción del producto...">{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Categoría *</label>
                        <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror">
                            <option value="">-- Seleccionar --</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id }}" {{ old('categoria_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Proveedor *</label>
                        <select name="proveedor_id" class="form-select @error('proveedor_id') is-invalid @enderror">
                            <option value="">-- Seleccionar --</option>
                            @foreach($proveedores as $prov)
                                <option value="{{ $prov->id }}" {{ old('proveedor_id') == $prov->id ? 'selected' : '' }}>
                                    {{ $prov->nombre_empresa }}
                                </option>
                            @endforeach
                        </select>
                        @error('proveedor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    {{-- SUBIDA DE ARCHIVOS --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="bi bi-image me-1"></i>Imagen del producto</label>
                        <input type="file" name="imagen" id="imagenInput"
                               class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                        <div class="form-text">JPG, PNG o WEBP. Máx 2 MB.</div>
                        @error('imagen')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="imagenPreview" class="mt-2"></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="bi bi-file-earmark-pdf me-1"></i>Ficha técnica (PDF)</label>
                        <input type="file" name="pdf" id="pdfInput"
                               class="form-control @error('pdf') is-invalid @enderror" accept=".pdf">
                        <div class="form-text">Solo PDF. Máx 5 MB.</div>
                        @error('pdf')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div id="pdfNombre" class="small text-muted mt-1"></div>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Guardar Producto
                    </button>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('imagenInput').addEventListener('change', function(e){
    const preview = document.getElementById('imagenPreview');
    preview.innerHTML = '';
    if(e.target.files[0]){
        const img = document.createElement('img');
        img.src = URL.createObjectURL(e.target.files[0]);
        img.style = 'width:80px;height:80px;object-fit:cover;border-radius:8px;';
        preview.appendChild(img);
    }
});
document.getElementById('pdfInput').addEventListener('change', function(e){
    const el = document.getElementById('pdfNombre');
    el.innerHTML = e.target.files[0]
        ? '<i class="bi bi-file-earmark-check text-success me-1"></i>' + e.target.files[0].name
        : '';
});
</script>
@endpush
