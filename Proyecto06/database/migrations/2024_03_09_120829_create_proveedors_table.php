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
        Schema::create('proveedors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreProveedor');
            $table->string('NIF');
            $table->string('categoria');
            $table->string('personaContacto');
            $table->string('telefonoContacto');
            $table->string('email');
            $table->string('direccion');
            $table->string('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedors');
    }
};
