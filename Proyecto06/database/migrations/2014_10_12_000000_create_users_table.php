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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('direccion')->nullable();; //
            //$table->string('tipoUsuario')->nullable(); // Permitirá valores nulos
            $table->string('numeroCuenta')->nullable(); // Permitirá valores nulos
            // $table->string('tarifaSocio');
            $table->string('fechaInicio')->nullable(); // Permitirá valores nulos
            $table->string('fechaFin')->nullable(); // Permitirá valores nulos
            $table->string('telefono')->nullable();; //


            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
