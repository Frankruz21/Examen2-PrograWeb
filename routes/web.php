<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MedicamentoController;
Route::resource('medicamentos', MedicamentoController::class);
Route::get('/', function () {
    return redirect()->route('medicamentos.index');
});

use App\Http\Controllers\ProveedorController;
Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);
Route::get('/', function () {
    return redirect()->route('proveedores.index');
});