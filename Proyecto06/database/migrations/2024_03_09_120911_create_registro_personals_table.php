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
        Schema::create('registro_personals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('tiempoRealizado');
            $table->string('repeticionesRealizadas');

            $table->foreignId('clase_diarias_id')->constrained();
            $table->foreignId('users_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_personals');
    }
};
