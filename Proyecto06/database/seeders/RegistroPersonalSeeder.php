<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegistroPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $registroPersonal = [
            [
                'idClase' => 2,
                'idSocio' => 14,
                'tiempoRealizado' => '4:00',
                'repeticionesRealizadas' => 55,
            ],
            [
                'idClase' => 2,
                'idSocio' => 16,
                'tiempoRealizado' => '4:50',
                'repeticionesRealizadas' => 65,
            ],
            [
                'idClase' => 2,
                'idSocio' => 9,
                'tiempoRealizado' => '3:00',
                'repeticionesRealizadas' => '',
            ],
        ];

        DB::table('registro_personals')->insert($registroPersonal);
    }
}