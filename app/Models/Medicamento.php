<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    protected $fillable = [
        'sku',
        'nombre',
        'categoria',
        'precio',
        'costo',
        'inventario',
        'imagen',
        'laboratorio',
        'fecha_vencimiento',
        'fecha_registro',
        'lote'
    ];
}
