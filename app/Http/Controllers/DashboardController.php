<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use App\Models\Proveedor;
use App\Models\Empleado;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMedicamentos = Medicamento::count();

        $proveedoresActivos = Proveedor::where('estado', 'activo')->count();

        $totalEmpleados = Empleado::count();

        $valorInventario = Medicamento::selectRaw(
            'COALESCE(SUM(inventario * precio), 0) as total'
        )->value('total');

        return view('dashboard', compact(
            'totalMedicamentos',
            'proveedoresActivos',
            'totalEmpleados',
            'valorInventario'
        ));
    }
}
