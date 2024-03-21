<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Crear el rol de socio si no existe
        $socioRol = Role::firstOrCreate(['name' => 'socio']);

        // Crear 20 usuarios con el rol de socio
        User::factory()
            ->count(20)
            ->create()
            ->each(function ($user) use ($socioRol) {
                $user->assignRole($socioRol);
            });
    }
}