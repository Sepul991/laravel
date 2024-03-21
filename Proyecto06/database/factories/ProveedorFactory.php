<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create();
        $nif = $faker->unique()->numerify('#############');
        $categorias = ['Bebida', 'Comida', 'Consumibles Deportivos', 'gymnastic', 'strenght', 'halterofilia', 'bodybuilding'];

        return [
            //
            'nombreProveedor' => fake()->name(),
            'NIF' => $nif,
            'categoria' => fake()->randomElement($categorias),
            'personaContacto' => fake()->name(),
            'telefonoContacto' => fake()->randomNumber(),
            'email' => fake()->email(),
            'direccion' => fake()->address(),
            'observaciones' => fake()->randomLetter()
        ];
    }
}