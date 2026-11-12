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