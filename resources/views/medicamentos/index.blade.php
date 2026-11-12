```blade
@extends('layouts.admin')

@section('titulo', 'Catálogo de Medicamentos')

@section('contenido')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Inventario de Medicamentos</h1>

    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Medicamento
    </a>
</div>

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Catálogo General - DISFARMA Honduras
        </h6>
    </div>

    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Buscador --}}
        <form action="{{ route('medicamentos.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control"
                    placeholder="Buscar por nombre o SKU..."
                    value="{{ request('buscar') }}">

                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search"></i> Buscar
                </button>

                <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">
                    Limpiar
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>SKU</th>
                        <th>Medicamento</th>
                        <th>Categoría</th>
                        <th>Laboratorio</th>
                        <th>Precio</th>
                        <th>Inventario</th>
                        <th>Lote</th>
                        <th>Vencimiento</th>
                        <th class="text-center" style="width: 110px;">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($medicamentos as $medicamento)
                    <tr>
                        <td>{{ $medicamento->id }}</td>

                        <td class="text-center">
                            @if($medicamento->imagen)
                                <img src="{{ asset('uploads/medicamentos/' . $medicamento->imagen) }}"
                                     alt="{{ $medicamento->nombre }}"
                                     width="55" height="55"
                                     style="object-fit: contain;">
                            @else
                                <span class="text-muted">
                                    <i class="fas fa-image fa-2x"></i>
                                </span>
                            @endif
                        </td>

                        <td>{{ $medicamento->sku }}</td>

                        <td class="fw-bold">{{ $medicamento->nombre }}</td>

                        <td>
                            @switch($medicamento->categoria)
                                @case('antibioticos')
                                    <span class="badge bg-primary">Antibióticos</span>
                                    @break

                                @case('analgesicos')
                                    <span class="badge bg-success">Analgésicos</span>
                                    @break

                                @case('sueros')
                                    <span class="badge bg-info text-dark">Sueros</span>
                                    @break

                                @case('material_quirurgico')
                                    <span class="badge bg-warning text-dark">Material Quirúrgico</span>
                                    @break

                                @case('vitaminas')
                                    <span class="badge bg-secondary">Vitaminas</span>
                                    @break
                            @endswitch
                        </td>

                        <td>{{ $medicamento->laboratorio }}</td>

                        <td>L. {{ number_format($medicamento->precio, 2) }}</td>

                        <td>
                            @if($medicamento->inventario > 20)
                                <span class="badge bg-success">
                                    {{ $medicamento->inventario }} - Óptimo
                                </span>
                            @elseif($medicamento->inventario >= 10)
                                <span class="badge bg-warning text-dark">
                                    {{ $medicamento->inventario }} - Moderado
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    {{ $medicamento->inventario }} - ¡Desabastecimiento!
                                </span>
                            @endif
                        </td>

                        <td>{{ $medicamento->lote }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($medicamento->fecha_vencimiento)->format('d/m/Y') }}
                        </td>

                        <td class="text-center">
                            <a href="{{ route('medicamentos.edit', $medicamento) }}"
                               class="btn btn-warning btn-sm"
                               title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('medicamentos.destroy', $medicamento) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar este medicamento?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="11" class="text-center text-muted py-4">
                            No hay medicamentos registrados en el inventario.
                        </td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        {{ $medicamentos->appends(request()->query())->links() }}

    </div>
</div>

@endsection
```