
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema de Gestión Interna DISFARMA" />
        <meta name="author" content="DISFARMA" />

        <title>DISFARMA - Sistema de Gestión Interna</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />

        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">

        <!-- Navbar superior -->
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">
                DISFARMA
            </a>

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
                id="sidebarToggle" href="#!">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Usuario autenticado -->
            <ul class="navbar-nav ms-auto me-3 me-lg-4">
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text-white"
                        id="navbarDropdown"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">

                        <i class="fas fa-user-circle me-1 text-warning"></i>
                        <span class="fw-bold">{{ Auth::user()->name }}</span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow"
                        aria-labelledby="navbarDropdown">

                        <li>
                            <span class="dropdown-item-text small text-muted">
                                {{ Auth::user()->email }}
                            </span>
                        </li>

                        <li><hr class="dropdown-divider" /></li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf

                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-1"></i>
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>

        </nav>

        <div id="layoutSidenav">

            <!-- Sidebar -->
            <div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">

                        <div class="nav">

                            <!-- Dashboard -->
                            <div class="sb-sidenav-menu-heading">Principal</div>

                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>

                            <!-- Gestión -->
                            <div class="sb-sidenav-menu-heading">Gestión</div>

                            <a class="nav-link" href="{{ route('medicamentos.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-pills"></i>
                                </div>
                                Medicamentos
                            </a>

                            <a class="nav-link" href="{{ route('medicamentos.create') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-plus-circle"></i>
                                </div>
                                Nuevo Medicamento
                            </a>

                            <!-- Personal -->
                            <div class="sb-sidenav-menu-heading">Personal</div>

                            <a class="nav-link" href="{{ route('empleados.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users text-warning"></i>
                                </div>
                                Empleados
                            </a>

                            <!-- Administración -->
                            <div class="sb-sidenav-menu-heading">Administración</div>

                            <a class="nav-link" href="{{ route('proveedores.index') }}">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-truck"></i>
                                </div>
                                Proveedores
                            </a>

                        </div>

                    </div>

                    <!-- Usuario conectado -->
                    <div class="sb-sidenav-footer">
                        <div class="small">Conectado como:</div>
                        <span class="text-white fw-bold">{{ Auth::user()->name }}</span>
                    </div>

                </nav>

            </div>

            <!-- Contenido principal -->
            <div id="layoutSidenav_content">

                <main>

                    <div class="container-fluid px-4 mt-4">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}

                                <button type="button" class="btn-close"
                                    data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif

                        @yield('contenido')

                    </div>

                </main>

                <!-- Footer -->
                <footer class="py-4 bg-light mt-auto">

                    <div class="container-fluid px-4">

                        <div class="d-flex align-items-center justify-content-between small text-muted">
                            <div>&copy; 2026 DISFARMA - Sistema de Gestión Interna</div>
                        </div>

                    </div>

                </footer>

            </div>

        </div>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('sb-admin/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('sb-admin/assets/demo/chart-bar-demo.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

        <script src="{{ asset('sb-admin/js/datatables-simple-demo.js') }}"></script>

    </body>
</html>

