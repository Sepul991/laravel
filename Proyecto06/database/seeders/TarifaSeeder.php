<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tarifas = [
            [
                'nombreTarifa' => 'Escaled',
                'precioTarifa' => 70,
                'descripcionTarifa' => '9 sesiones al mes',
                'duracionTarifa' => '##########',
                'beneficios' => '##########'
            ],
            [
                'nombreTarifa' => 'Iniciación',
                'precioTarifa' => 75,
                'descripcionTarifa' => '12 sesiones al mes',
                'duracionTarifa' => '##########',
                'beneficios' => '##########'
            ],
            [
                'nombreTarifa' => 'RX',
                'precioTarifa' => 85,
                'descripcionTarifa' => '18 sesiones al mes',
                'duracionTarifa' => '##########',
                'beneficios' => '##########'
            ],
            [
                'nombreTarifa' => 'Elite',
                'precioTarifa' => 95,
                'descripcionTarifa' => 'Ilimitado',
                'duracionTarifa' => '##########',
                'beneficios' => '##########'
            ],
        ];

        DB::table('tarifas')->insert($tarifas);
    }
}