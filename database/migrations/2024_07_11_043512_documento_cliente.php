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
        Schema::create('DocumentoCliente', function (Blueprint $table) {
            $table->increments('Codigo'); 
            $table->string('Original_Copia', 50);
            $table->string('Archivo'); 
            $table->string('Nombre_Archivo', 100); 
            $table->string('Tipo_Archivo', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('DocumentoCliente');
    }
};
