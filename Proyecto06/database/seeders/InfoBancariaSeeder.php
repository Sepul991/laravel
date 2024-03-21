<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoBancariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = FakerFactory::create();

        $usuarios = User::whereHas('roles', function ($query) {
            $query->where('name', 'socio');
        })->get();
        $numUsuarios = $usuarios->count();

        $datosBancoUsuario = [];
        $nombreBanco = ['BBVA', ' Banco Santander', 'La Caixa'];

        // dd($usuarios);


        for ($i = 0; $i < $numUsuarios; $i++) {
            foreach ($usuarios as $usuario) {
                $iban = $faker->iban('ES');
                $datoBancoUsuario = [
                    'id' => $usuario->id,
                    'nombreTitular' => $usuario->name,
                    'IBAN' => $iban,
                    'nombreBanco' => $nombreBanco[rand(0, 2)],
                    'tipoCuenta' => 'Ahorro'
                ];
                $datosBancoUsuario[] = $datoBancoUsuario;
            }
        }

        foreach ($datosBancoUsuario as $datos) {
            # code...
            $datosInsertar = [
                'users_id' => $datos['id'],
                'nombreTitular' => $datos['nombreTitular'],
                'IBAN' => $datos['IBAN'],
                'nombreBanco' => $datos['nombreBanco'],
                'tipoCuenta' => $datos['tipoCuenta']
            ];

            DB::table('info_bancarias')->insert($datosInsertar);
        }
    }
}