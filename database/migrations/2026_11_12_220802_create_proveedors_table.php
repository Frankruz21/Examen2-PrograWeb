<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->string('rtn')->unique();
            $table->string('empresa');
            $table->string('contacto');
            $table->string('telefono');
            $table->enum('categoria',['farmacos','material_quirurgico','equipos']);
            $table->decimal('limite_credito',10,2);
            $table->enum('dias_credito', ['15 dias', '30 dias', '45 dias', '60 dias']);
            $table->enum('estado',['activo', 'inactivo']);
            $table->date('fecha_registro');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
