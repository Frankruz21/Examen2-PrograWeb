
@extends('layouts.admin')

@section('titulo', 'Proveedores')

@section('contenido')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Proveedores</h1>
            <p class="mb-0 text-muted">Administración de proveedores de DISFARMA</p>
        </div>

        <a href="{{ route('proveedores.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nuevo proveedor
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 fw-bold text-primary">Listado de proveedores</h6>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" width="100%" cellspacing="0">

                    <thead class="table-light">
                        <tr>
                            <th>RTN</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                            <th>Teléfono</th>
                            <th>Categoría</th>
                            <th>Límite de crédito</th>
                            <th>Días de crédito</th>
                            <th>Estado</th>
                            <th>Fecha de registro</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->rtn }}</td>
                                <td>{{ $proveedor->empresa }}</td>
                                <td>{{ $proveedor->contacto }}</td>
                                <td>{{ $proveedor->telefono }}</td>

                                <td>
                                    @switch($proveedor->categoria)
                                        @case('farmacos')
                                            Fármacos
                                            @break
                                        @case('material_quirurgico')
                                            Material quirúrgico
                                            @break
                                        @case('equipos')
                                            Equipos
                                            @break
                                    @endswitch
                                </td>

                                <td>L. {{ number_format($proveedor->limite_credito, 2) }}</td>
                                <td>{{ $proveedor->dias_credito }}</td>

                                <td>
                                    @if ($proveedor->estado === 'activo')
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>

                                <td>{{ \Carbon\Carbon::parse($proveedor->fecha_registro)->format('d/m/Y') }}</td>

                                <td class="text-center">
                                    <a href="{{ route('proveedores.edit', $proveedor) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('proveedores.destroy', $proveedor) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    No hay proveedores registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $proveedores->links() }}
            </div>
        </div>
    </div>

</div>

@endsection
