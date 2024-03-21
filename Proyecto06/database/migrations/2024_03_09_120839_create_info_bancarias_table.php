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
        Schema::create('info_bancarias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreTitular');
            $table->string('IBAN')->unique(); // unique
            $table->string('nombreBanco');
            $table->string('tipoCuenta');

            $table->foreignId('users_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_bancarias');
    }
};
