
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>Registro de Personal - DISFARMA</title>

    <link href="{{ asset('sb-admin/css/styles.css') }}" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">

                            <div class="card shadow-lg border-0 rounded-lg mt-5">

                                <div class="card-header bg-dark text-white text-center py-4">
                                    <h3 class="font-weight-light my-2">
                                        <i class="fas fa-user-plus text-success me-2"></i>
                                        Crear Cuenta de Empleado
                                    </h3>

                                    <small class="text-white-50">
                                        DISFARMA - Sistema de Gestión Interna
                                    </small>
                                </div>

                                <div class="card-body p-4">

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <i class="fas fa-exclamation-circle me-1"></i>

                                            {{ $errors->first() }}

                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="alert" aria-label="Close">
                                            </button>
                                        </div>
                                    @endif

                                    <form action="{{ route('register.post') }}" method="POST">
                                        @csrf

                                        <!-- Nombre -->
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control @error('name') is-invalid @enderror"
                                                id="inputName"
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                placeholder="Juan Pérez"
                                                required
                                                autofocus
                                            />

                                            <label for="inputName">
                                                <i class="fas fa-user me-1"></i>
                                                Nombre Completo
                                            </label>

                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Correo -->
                                        <div class="form-floating mb-3">
                                            <input
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail"
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                placeholder="empleado@disfarma.hn"
                                                required
                                            />

                                            <label for="inputEmail">
                                                <i class="fas fa-envelope me-1"></i>
                                                Correo Institucional
                                            </label>

                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Contraseñas -->
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        id="inputPassword"
                                                        type="password"
                                                        name="password"
                                                        placeholder="Contraseña"
                                                        required
                                                    />

                                                    <label for="inputPassword">
                                                        <i class="fas fa-lock me-1"></i>
                                                        Contraseña
                                                    </label>

                                                    @error('password')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input
                                                        class="form-control"
                                                        id="inputPasswordConfirm"
                                                        type="password"
                                                        name="password_confirmation"
                                                        placeholder="Confirmar contraseña"
                                                        required
                                                    />

                                                    <label for="inputPasswordConfirm">
                                                        <i class="fas fa-lock me-1"></i>
                                                        Confirmar Contraseña
                                                    </label>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Botón -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <a class="small" href="{{ route('login') }}">
                                                Volver al inicio de sesión
                                            </a>

                                            <button type="submit" class="btn btn-success px-4">
                                                <i class="fas fa-user-plus me-1"></i>
                                                Registrarse
                                            </button>

                                        </div>

                                    </form>

                                </div>

                                <div class="card-footer text-center py-3 bg-light">
                                    <div class="small text-muted">
                                        DISFARMA - Registro de personal autorizado
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

    <script src="{{ asset('sb-admin/js/scripts.js') }}"></script>

</body>
</html>
