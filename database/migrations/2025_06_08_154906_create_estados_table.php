<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('codigo_estado'); // clave primaria personalizada
            $table->string('nombre_estado');

            $table->unsignedInteger('codigo_continente');
            $table->unsignedInteger('codigo_pais');

            // Clave foránea a continentes
            $table->foreign('codigo_continente')
                  ->references('codigo_continente')
                  ->on('continentes')
                  ->onDelete('cascade');

            // Clave foránea a pais
            $table->foreign('codigo_pais')
                  ->references('codigo_pais')
                  ->on('pais') // usa tabla pais
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('estados');
    }
};
