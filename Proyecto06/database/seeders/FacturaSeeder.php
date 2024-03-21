<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $facturas = [];

        // Generar 10 facturas
        for ($i = 0; $i < 10; $i++) {
            $factura = [
                'codFact' => 'FACT-' . ($i + 1), // Código de factura único
                'fechaCompra' => date('Y-m-d'), // Fecha actual
                'codigoUsuario' => rand(1, 20), // Código de usuario aleatorio
                'codigoProveedor' => rand(1, 5), // Código de proveedor aleatorio
                'metodoPago' => ['Efectivo', 'Tarjeta', 'Transferencia'][array_rand(['Efectivo', 'Tarjeta', 'Transferencia'])], // Método de pago aleatorio
                'observaciones' => 'Observaciones de la factura ' . ($i + 1), // Observaciones
            ];

            // Agregar la factura al array de facturas
            $facturas[] = $factura;
        }
        // Array para inserción de datos
        foreach ($facturas as $dato) {
            $datosInsertar = [
                'codFact' => $dato['codFact'],
                'fechaCompra' => $dato['fechaCompra'],
                'codigoUsuario' => $dato['codigoUsuario'],
                'codigoProveedor' => $dato['codigoProveedor'],
                'metodoPago' => $dato['metodoPago'],
                'observaciones' => $dato['observaciones']
            ];

            DB::table('facturas')->insert($datosInsertar);
        }
    }
}