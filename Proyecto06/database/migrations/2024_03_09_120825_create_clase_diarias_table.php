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
        Schema::create('clase_diarias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->time('hora');
            $table->date('diaClase');
            $table->string('tipoClase');
            $table->string('programacion');

            $table->foreignId('users_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clase_diarias');
    }
};
