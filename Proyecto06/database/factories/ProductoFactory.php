<?php

namespace Database\Factories;

use App\Models\CategoriaProducto;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {


        // Arreglos de nombres de productos por categoría
        $categorias_productos = [
            'Comida' => [
                "Barrita energetica coco",
                "Barrita energetica caramelo",
                "Barrita energetica chocolate",
                "Snacks",
                "Frutos secos",
            ],
            'Bebida' => [
                "Agua mineral",
                "Batido de proteínas",
                "Nocco",
                "Café",
                "Smoothie de frutas",
            ],
            'Gymnastic' => [
                "Calleras",
                "Magnesio",
            ],
            'Haltero' => [
                "Barra olímpica",
                "cierres",
                "discos 10kg",
                "discos 20kg",
                "discos 5kg",
                "discos 2.5kg",
                "discos 15kg",
            ],
            'Bodibuilding' => [
                "Mnacuernas",
                "Pesas",
                "Banco de pesas",
                "Bicicleta estática",
                "Bola de yoga"
            ]
        ];

        // Obtener proveedores de la base de datos
        $proveedores = Proveedor::pluck('nombreProveedor');

        // Inicializar arreglo de atributos de producto
        $producto_attributes = [];

        // Iterar sobre cada categoría y generar productos para ella
        foreach ($categorias_productos as $categoria => $productos) {
            $categoria_id = CategoriaProducto::where('nombreCategoria', $categoria)->value('id');
            foreach ($productos as $nombreProducto) {
                $producto_attributes[] = [
                    'categoria_productos_id' => $categoria_id,
                    'nombreProducto' => $nombreProducto,
                    'descripcionProducto' => '#########################################',
                    'precioUnitario' => $this->faker->randomFloat(2, 1.5, 500),
                    'stockMin' => $this->faker->numberBetween(5, 20),
                    'stockActual' => $this->faker->numberBetween(5, 20),
                ];
            }
        }

        return $producto_attributes;
    }
}