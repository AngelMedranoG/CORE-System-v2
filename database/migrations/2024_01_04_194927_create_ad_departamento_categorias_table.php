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
        Schema::create('ad_departamento_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('ad_departamentos')->onDelete('cascade');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('ad_categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_departamento_categorias');
    }
};
