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
        Schema::create('pais', function (Blueprint $table) {
            $table->increments('codigo_pais');
            $table->string('nombre_pais');
            $table->unsignedInteger('codigo_continente');
            $table->foreign('codigo_continente')->references('codigo_continente')->on('continentes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pais');
    }
};
