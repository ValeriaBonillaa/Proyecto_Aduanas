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
        Schema::create('Cliente', function (Blueprint $table) {
            $table->bigIncrements('codigo'); // Clave primaria incremental
            $table->string('Nombre_Empresa');
            $table->string('Cedula_Juridica');
            $table->string('Ubicacion_Empresa');
            $table->string('Nombre_Contacto');
            $table->string('Apellido1');
            $table->string('Apellido2');
            $table->string('Cedula_Contacto');
            $table->string('Correo_Electronico')->unique();
            $table->string('Telefono');
            $table->timestamps(); // Añade created_at y updated_at
        });
    }   

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cliente');
    }
};
