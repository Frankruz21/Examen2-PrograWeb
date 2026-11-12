<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $medicamentos = Medicamento::query()
            ->when($request->buscar, function ($query, $buscar) {
                $query->where('nombre', 'LIKE', "%{$buscar}%")
                    ->orWhere('sku', 'LIKE', "%{$buscar}%");
            })
            ->latest()
            ->paginate(10);

        return view('medicamentos.index', compact('medicamentos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku'         => 'required|unique:medicamentos,sku',
            'nombre'      => 'required|max:255',
            'categoria'   => 'required|in:antibioticos,sueros,analgesicos,material_quirurgico,vitaminas', 
            'precio'      => 'required|numeric|gt:0',
            'costo'       => 'required|numeric|gt:0',
            'inventario'  => 'required|integer|min:0',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio' => 'required|max:255',
            'fecha_vencimiento' => 'required',
            'fecha_registro'    => 'required',
            'lote'        =>'required|max:255'
        ]);
        Medicamento::create($request->all());
        
        $datos = $request->except('imagen');
        if ($request->hasFile('imagen')) {

            $nombreImagen = $request->file('imagen')->hashName();

            $request->file('imagen')->move(
                public_path('uploads/medicamentos'),
                $nombreImagen
            );

            $datos['imagen'] = $nombreImagen;
        }

        Medicamento::create($datos);

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento registrado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
         return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicamento $medicamento)
    {
        $request->validate([
            'sku'         => 'required|unique:medicamentos,sku,' . $medicamento->id,
            'nombre'      => 'required|max:255',
            'categoria'   => 'required|in:antibioticos,sueros,analgesicos,material_quirurgico,vitaminas', 
            'precio'      => 'required|numeric|gt:0',
            'costo'       => 'required|numeric|gt:0',
            'inventario'  => 'required|integer|min:0',
            'imagen'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'laboratorio' => 'required|max:255',
            'fecha_vencimiento' => 'required',
            'fecha_registro'    => 'required',
            'lote'        =>'required|max:255'
        ]);
        $medicamento->update($request->all());

        $datos = $request->except('imagen');
        if ($request->hasFile('imagen')) {

            $nombreImagen = $request->file('imagen')->hashName();

            $request->file('imagen')->move(
                public_path('uploads/medicamentos'),
                $nombreImagen
            );

            if ($medicamento->imagen &&
                file_exists(public_path('uploads/medicamentos/' . $medicamento->imagen))) {

                unlink(public_path('uploads/medicamentos/' . $medicamento->imagen));
            }

            $datos['imagen'] = $nombreImagen;
        }

        $medicamento->update($datos);

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
         $medicamento->delete();

        return redirect()->route('medicamentos.index')
                         ->with('success', '¡Medicamento eliminado del inventario!');
    }
}
