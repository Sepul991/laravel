<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroAltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $usuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'socio');
        })->get();

        foreach ($usuarios as $usuario) {
            $numSocios = rand(1, 5); // Definir un número aleatorio de altas por cada socio

            for ($i = 0; $i < $numSocios; $i++) {
                $daysAgo = rand(1, 365); // Genera un número aleatorio de días entre 1 y 365
                $fechaAlta = date('Y-m-d', strtotime("-$daysAgo days")); // Resta el número de días a la fecha actual

                $datoUsuario = [
                    'idUsuario' => $usuario->id,
                    'idSuscripcion' => rand(1, 3),
                    'fechaAlta' => $fechaAlta,
                    'fechaBaja' => null,
                ];

                // Insertar el registro de alta en la tabla registro_altas
                DB::table('registro_altas')->insert($datoUsuario);
            }
        }
    }
}