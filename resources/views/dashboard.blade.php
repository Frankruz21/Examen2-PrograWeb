
@extends('layouts.admin')

@section('contenido')

    <div class="container-fluid px-0">

        <!-- Encabezado -->
        <h1 class="mt-4">Dashboard</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Panel de Administración</li>
        </ol>

        <div class="mb-4">
            <h5>Bienvenido al Sistema de Gestión Interna DISFARMA</h5>
            <p class="text-muted">
                Aquí puedes consultar el resumen general de la empresa.
            </p>
        </div>

        <!-- Métricas -->
        <div class="row">

            <!-- Total de medicamentos -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Total de Medicamentos</h6>
                                <h2 class="mb-0">{{ $totalMedicamentos }}</h2>
                            </div>

                            <i class="fas fa-pills fa-3x text-white-50"></i>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('medicamentos.index') }}">
                            Ver medicamentos
                        </a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Proveedores activos -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Proveedores Activos</h6>
                                <h2 class="mb-0">{{ $proveedoresActivos }}</h2>
                            </div>

                            <i class="fas fa-truck fa-3x text-white-50"></i>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('proveedores.index') }}">
                            Ver proveedores
                        </a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Total de empleados -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-dark mb-4">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-dark-50">Total de Empleados</h6>
                                <h2 class="mb-0">{{ $totalEmpleados }}</h2>
                            </div>

                            <i class="fas fa-users fa-3x text-dark-50"></i>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-dark stretched-link" href="{{ route('empleados.index') }}">
                            Ver empleados
                        </a>
                        <div class="small text-dark">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Valor del inventario -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-dark text-white mb-4">

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-white-50">Valor del Inventario</h6>
                                <h2 class="mb-0">
                                    L. {{ number_format((float) $valorInventario, 2) }}
                                </h2>
                            </div>

                            <i class="fas fa-dollar-sign fa-3x text-white-50"></i>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('medicamentos.index') }}">
                            Consultar inventario
                        </a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
