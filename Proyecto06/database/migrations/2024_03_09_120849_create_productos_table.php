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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombreProducto');
            $table->string('descripcionProducto');
            $table->float('precioUnitario');
            $table->integer('stockMin');
            $table->integer('stockActual');
            $table->date('fechaUltimaCompra');
            $table->string('proveedorPreferido');
            $table->string('Observaciones');



            $table->foreignId('categoria_productos_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};