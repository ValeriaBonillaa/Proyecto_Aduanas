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
        Schema::create('Usuario', function (Blueprint $table) {
            $table->increments('Codigo');
            $table->string('Nombre', 50);
            $table->string('Apellido1', 50);
            $table->string('Apellido2', 50);
            $table->string('Cedula', 20);
            $table->string('email', 100);
            $table->string('Telefono', 20);
            $table->string('password', 100);
            $table->string('Usuario', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuario');
    }
};
