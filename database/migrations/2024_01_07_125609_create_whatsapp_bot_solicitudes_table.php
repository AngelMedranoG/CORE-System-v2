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
        Schema::create('whatsapp_bot_solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('telefono');
            $table->string('seccion');
            $table->tinyInteger('paso');
            $table->dateTime('fecha_solicitud');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('whatsapp_bot_solicitudes');
    }
};
