
@extends('layouts.admin')

@section('titulo', 'Registrar empleado')

@section('contenido')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Registrar empleado</h1>
            <p class="mb-0 text-muted">Ingresa la información del nuevo empleado</p>
        </div>

        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Regresar
        </a>
    </div>

    <div class="card shadow mb-4">

        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Información del empleado</h6>
        </div>

        <div class="card-body">

            <form action="{{ route('empleados.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text"
                               name="dni"
                               id="dni"
                               class="form-control @error('dni') is-invalid @enderror"
                               value="{{ old('dni') }}"
                               maxlength="13"
                               placeholder="Ingrese los 13 dígitos"
                               required>
                        @error('dni')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text"
                               name="nombre"
                               id="nombre"
                               class="form-control @error('nombre') is-invalid @enderror"
                               value="{{ old('nombre') }}"
                               maxlength="255"
                               required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text"
                               name="apellido"
                               id="apellido"
                               class="form-control @error('apellido') is-invalid @enderror"
                               value="{{ old('apellido') }}"
                               maxlength="255"
                               required>
                        @error('apellido')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="email"
                               name="correo"
                               id="correo"
                               class="form-control @error('correo') is-invalid @enderror"
                               value="{{ old('correo') }}"
                               maxlength="255"
                               required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="cargo" class="form-label">Cargo</label>
                        <select name="cargo"
                                id="cargo"
                                class="form-select @error('cargo') is-invalid @enderror"
                                required>
                            <option value="">Seleccione un cargo</option>

                            @foreach ([
                                'Regente Farmaceutico',
                                'Asistente de Farmacia',
                                'Jefe de Bodega',
                                'Despachador',
                                'Cajero'
                            ] as $cargo)
                                <option value="{{ $cargo }}" {{ old('cargo') == $cargo ? 'selected' : '' }}>
                                    {{ $cargo }}
                                </option>
                            @endforeach

                        </select>
                        @error('cargo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="salario" class="form-label">Salario (L.)</label>
                        <input type="number"
                               name="salario"
                               id="salario"
                               class="form-control @error('salario') is-invalid @enderror"
                               value="{{ old('salario') }}"
                               min="0.01"
                               step="0.01"
                               required>
                        @error('salario')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                        <input type="date"
                               name="fecha_ingreso"
                               id="fecha_ingreso"
                               class="form-control @error('fecha_ingreso') is-invalid @enderror"
                               value="{{ old('fecha_ingreso', date('Y-m-d')) }}"
                               required>
                        @error('fecha_ingreso')
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

                </div>

                <hr>

                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Registrar empleado
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
