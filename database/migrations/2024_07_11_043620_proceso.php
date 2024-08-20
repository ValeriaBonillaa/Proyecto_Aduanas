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
        Schema::create('Proceso', function (Blueprint $table) {
            $table->increments('Codigo'); 
            $table->string('Aduana_Asociada', 60);
            $table->unsignedBigInteger('Cliente_Codigo'); 
            $table->unsignedInteger('Operador_Codigo');
            $table->unsignedInteger('Usuario_Codigo');
            $table->unsignedInteger('Mercancia_Codigo');
            $table->unsignedInteger('DocumentoCliente_Codigo');
            $table->foreign('Cliente_Codigo')->references('codigo')->on('Cliente')->onDelete('cascade');
            $table->foreign('Operador_Codigo')->references('Codigo')->on('Operador')->onDelete('cascade');
            $table->foreign('Usuario_Codigo')->references('Codigo')->on('Usuario')->onDelete('cascade');
            $table->foreign('Mercancia_Codigo')->references('Codigo')->on('Mercancia')->onDelete('cascade');
            $table->foreign('DocumentoCliente_Codigo')->references('Codigo')->on('DocumentoCliente')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Proceso');
    }
};
