
@extends('layouts.admin')

@section('titulo', 'Empleados')

@section('contenido')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
            <p class="mb-0 text-muted">Administración del personal de DISFARMA</p>
        </div>

        <a href="{{ route('empleados.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nuevo empleado
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
            <h6 class="m-0 fw-bold text-primary">Listado de empleados</h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle" width="100%" cellspacing="0">

                    <thead class="table-light">
                        <tr>
                            <th>DNI</th>
                            <th>Nombre completo</th>
                            <th>Correo</th>
                            <th>Cargo</th>
                            <th>Salario</th>
                            <th>Fecha de ingreso</th>
                            <th>Estado</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($empleados as $empleado)
                            <tr>
                                <td>{{ $empleado->dni }}</td>

                                <td>
                                    {{ $empleado->nombre }} {{ $empleado->apellido }}
                                </td>

                                <td>{{ $empleado->correo }}</td>

                                <td>{{ $empleado->cargo }}</td>

                                <td>
                                    L. {{ number_format($empleado->salario, 2) }}
                                </td>

                                <td>
                                    {{ \Carbon\Carbon::parse($empleado->fecha_ingreso)->format('d/m/Y') }}
                                </td>

                                <td>
                                    @if ($empleado->estado === 'activo')
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('empleados.edit', $empleado) }}"
                                       class="btn btn-warning btn-sm"
                                       title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('empleados.destroy', $empleado) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este empleado?');">

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
                                <td colspan="8" class="text-center text-muted py-4">
                                    No hay empleados registrados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $empleados->links() }}
            </div>

        </div>
    </div>

</div>

@endsection
