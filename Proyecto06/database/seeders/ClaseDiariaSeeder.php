<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClaseDiariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


        $clases = [
            [
                'hora' => '7:00:00',
                'diaClase' => '2024-02-23',
                'tipoClase' => 'WOD',
                'programacion' => 'Program'
            ],
            [
                'hora' => '9:00:00',
                'diaClase' => '2024-02-23',
                'tipoClase' => 'WOD',
                'programacion' => 'Program'
            ],
            [
                'hora' => '10:00:00',
                'diaClase' => '2024-02-23',
                'tipoClase' => 'WOD',
                'programacion' => 'Program'
            ],
        ];

        // Insertar clases para una semana completa (5 días)
        for ($i = 0; $i < 5; $i++) {
            $dia = date('Y-m-d', strtotime("2024-02-23 + $i days")); // Incrementar día

            // Copiar las clases del arreglo y actualizar el día
            $clases_para_insertar = array_map(function ($clase) use ($dia) {
                return array_merge($clase, ['diaClase' => $dia, 'users_id' => 2]); // Cambiar por el ID del coach
            }, $clases);

            // Insertar clases en la base de datos
            DB::table('clase_diarias')->insert($clases_para_insertar);
        }

        echo "Se han insertado clases hasta las 18:00 horas para toda una semana.";
    }
}