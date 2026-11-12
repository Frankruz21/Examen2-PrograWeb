<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::latest()->paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedors,rtn',
            'empresa' => 'required|max:255',
            'contacto' => 'required|max:255',
            'telefono' => 'required|regex:/^[2389]\d{7}$/',
            'categoria' => 'required|max:255',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15 dias,30 dias,45 dias,60 dias',
            'estado' => 'required|in:activo,inactivo',
            'fecha_registro' => 'required|date',
        ]);
        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor registrado exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'rtn' => 'required|digits:14|unique:proveedors,rtn,' . $proveedor->id, 
            'empresa' => 'required|max:255',
            'contacto' => 'required|max:255',
            'telefono' => 'required|regex:/^[2389]\d{7}$/',
            'categoria' => 'required|max:255',
            'limite_credito' => 'required|numeric|min:0',
            'dias_credito' => 'required|in:15 dias,30 dias,45 dias,60 dias',
            'estado' => 'required|in:activo,inactivo',
            'fecha_registro' => 'required|date',
        ]);

        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();

        return redirect()->route('proveedores.index')
                         ->with('success', '¡Proveedor eliminado correctamente!');
    }
}
