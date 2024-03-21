<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = ['Bebida', 'Comida', 'Consumibles Deportivos'];


        foreach ($categorias as $producto) {
            # code...
            DB::table('categoria_productos')->insert([
                'nombreCategoria' => $producto
            ]);
        }
    }
}