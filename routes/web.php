<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\DashboardController;


// RUTAS PÚBLICAS (Solo invitados: guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register'
);
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::get('/', function () {
    return view('welcome');
});

// RUTAS PROTEGIDAS (Solo autenticados: auth)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('medicamentos', MedicamentoController::class);
    Route::get('/', function () {
        return redirect()->route('medicamentos.index');
    });

    Route::resource('proveedores', ProveedorController::class)
        ->parameters(['proveedores' => 'proveedor']);
    Route::get('/', function () {
        return redirect()->route('proveedores.index');
    });

    Route::resource('empleados', EmpleadoController::class);
    Route::get('/', function () {
        return redirect()->route('empleados.index');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

});

