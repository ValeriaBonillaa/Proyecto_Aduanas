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
        Schema::create('Mercancia', function (Blueprint $table) {
            $table->increments('Codigo'); // Clave primaria auto-incremental
            $table->string('Descripcion', 200);
            $table->string('Unidad_Medida', 50);
            $table->decimal('Valor_Aduanero', 18, 2);
            $table->string('Ubicacion', 100);
            $table->integer('Cantidad');
            $table->string('Puerto_Origen', 100);
            $table->string('Puerto_Destino', 100);
            $table->string('Bulto', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Mercancia');
    }
};
