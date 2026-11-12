
@extends('layouts.admin')

@section('titulo', 'Registrar proveedor')

@section('contenido')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Registrar proveedor</h1>
            <p class="mb-0 text-muted">Ingresa la información del nuevo proveedor</p>
        </div>

        <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Regresar
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Información del proveedor</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('proveedores.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="rtn" class="form-label">RTN</label>
                        <input type="text"
                               name="rtn"
                               id="rtn"
                               class="form-control @error('rtn') is-invalid @enderror"
                               value="{{ old('rtn') }}"
                               maxlength="14"
                               placeholder="Ingrese los 14 dígitos"
                               required>
                        @error('rtn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="empresa" class="form-label">Nombre de la empresa</label>
                        <input type="text"
                               name="empresa"
                               id="empresa"
                               class="form-control @error('empresa') is-invalid @enderror"
                               value="{{ old('empresa') }}"
                               maxlength="255"
                               required>
                        @error('empresa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="contacto" class="form-label">Persona de contacto</label>
                        <input type="text"
                               name="contacto"
                               id="contacto"
                               class="form-control @error('contacto') is-invalid @enderror"
                               value="{{ old('contacto') }}"
                               maxlength="255"
                               required>
                        @error('contacto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text"
                               name="telefono"
                               id="telefono"
                               class="form-control @error('telefono') is-invalid @enderror"
                               value="{{ old('telefono') }}"
                               maxlength="8"
                               placeholder="Ej. 98765432"
                               required>
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="categoria" class="form-label">Categoría</label>
                        <select name="categoria"
                                id="categoria"
                                class="form-select @error('categoria') is-invalid @enderror"
                                required>
                            <option value="">Seleccione una categoría</option>
                            <option value="farmacos" {{ old('categoria') == 'farmacos' ? 'selected' : '' }}>
                                Fármacos
                            </option>
                            <option value="material_quirurgico" {{ old('categoria') == 'material_quirurgico' ? 'selected' : '' }}>
                                Material quirúrgico
                            </option>
                            <option value="equipos" {{ old('categoria') == 'equipos' ? 'selected' : '' }}>
                                Equipos
                            </option>
                        </select>
                        @error('categoria')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="limite_credito" class="form-label">Límite de crédito (L.)</label>
                        <input type="number"
                               name="limite_credito"
                               id="limite_credito"
                               class="form-control @error('limite_credito') is-invalid @enderror"
                               value="{{ old('limite_credito') }}"
                               min="0"
                               step="0.01"
                               required>
                        @error('limite_credito')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="dias_credito" class="form-label">Días de crédito</label>
                        <select name="dias_credito"
                                id="dias_credito"
                                class="form-select @error('dias_credito') is-invalid @enderror"
                                required>
                            <option value="">Seleccione los días de crédito</option>
                            @foreach (['15 dias', '30 dias', '45 dias', '60 dias'] as $dias)
                                <option value="{{ $dias }}" {{ old('dias_credito') == $dias ? 'selected' : '' }}>
                                    {{ $dias }}
                                </option>
                            @endforeach
                        </select>
                        @error('dias_credito')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select name="estado"
                                id="estado"
                                class="form-select @error('estado') is-invalid @enderror"
                                required>
                            <option value="">Seleccione un estado</option>
                            <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>
                                Activo
                            </option>
                            <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>
                                Inactivo
                            </option>
                        </select>
                        @error('estado')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="fecha_registro" class="form-label">Fecha de registro</label>
                        <input type="date"
                               name="fecha_registro"
                               id="fecha_registro"
                               class="form-control @error('fecha_registro') is-invalid @enderror"
                               value="{{ old('fecha_registro', date('Y-m-d')) }}"
                               required>
                        @error('fecha_registro')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Registrar proveedor
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
