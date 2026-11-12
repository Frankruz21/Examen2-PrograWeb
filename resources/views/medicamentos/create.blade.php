```blade
@extends('layouts.admin')

@section('titulo', 'Nuevo Medicamento')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Registrar Medicamento</h1>

    <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Volver
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Información del Medicamento
        </h6>
    </div>

    <div class="card-body">

        <form action="{{ route('medicamentos.store') }}" method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Código SKU</label>
                    <input type="text" name="sku"
                        class="form-control @error('sku') is-invalid @enderror"
                        value="{{ old('sku') }}"
                        placeholder="Ej. MED-001">

                    @error('sku')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre del medicamento</label>
                    <input type="text" name="nombre"
                        class="form-control @error('nombre') is-invalid @enderror"
                        value="{{ old('nombre') }}"
                        placeholder="Nombre del medicamento">

                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categoría</label>

                    <select name="categoria"
                        class="form-select @error('categoria') is-invalid @enderror">

                        <option value="">Seleccione una categoría</option>

                        <option value="antibioticos" {{ old('categoria') == 'antibioticos' ? 'selected' : '' }}>
                            Antibióticos
                        </option>

                        <option value="analgesicos" {{ old('categoria') == 'analgesicos' ? 'selected' : '' }}>
                            Analgésicos
                        </option>

                        <option value="sueros" {{ old('categoria') == 'sueros' ? 'selected' : '' }}>
                            Sueros
                        </option>

                        <option value="material_quirurgico" {{ old('categoria') == 'material_quirurgico' ? 'selected' : '' }}>
                            Material Quirúrgico
                        </option>

                        <option value="vitaminas" {{ old('categoria') == 'vitaminas' ? 'selected' : '' }}>
                            Vitaminas
                        </option>

                    </select>

                    @error('categoria')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Laboratorio</label>

                    <input type="text" name="laboratorio"
                        class="form-control @error('laboratorio') is-invalid @enderror"
                        value="{{ old('laboratorio') }}"
                        placeholder="Nombre del laboratorio">

                    @error('laboratorio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Precio de venta (L.)</label>

                    <input type="number" name="precio"
                        class="form-control @error('precio') is-invalid @enderror"
                        value="{{ old('precio') }}"
                        min="0.01" step="0.01"
                        placeholder="Ej. 150.00">

                    @error('precio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Costo de adquisición (L.)</label>

                    <input type="number" name="costo"
                        class="form-control @error('costo') is-invalid @enderror"
                        value="{{ old('costo') }}"
                        min="0.01" step="0.01"
                        placeholder="Ej. 100.00">

                    @error('costo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Inventario (Existencias)</label>

                    <input type="number" name="inventario"
                        class="form-control @error('inventario') is-invalid @enderror"
                        value="{{ old('inventario') }}"
                        min="0" step="1"
                        placeholder="Cantidad disponible">

                    @error('inventario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Número de lote</label>

                    <input type="text" name="lote"
                        class="form-control @error('lote') is-invalid @enderror"
                        value="{{ old('lote') }}"
                        placeholder="Número de lote">

                    @error('lote')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de vencimiento</label>

                    <input type="date" name="fecha_vencimiento"
                        class="form-control @error('fecha_vencimiento') is-invalid @enderror"
                        value="{{ old('fecha_vencimiento') }}">

                    @error('fecha_vencimiento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Fecha de registro</label>

                    <input type="date" name="fecha_registro"
                        class="form-control @error('fecha_registro') is-invalid @enderror"
                        value="{{ old('fecha_registro', date('Y-m-d')) }}">

                    @error('fecha_registro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Fotografía del empaque</label>

                    <input type="file" name="imagen"
                        class="form-control @error('imagen') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">
                        Formatos permitidos: JPG, PNG y WEBP. Máximo 5 MB.
                    </small>

                    @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <hr>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
                    Cancelar
                </a>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Medicamento
                </button>

            </div>

        </form>

    </div>
</div>

@endsection
```