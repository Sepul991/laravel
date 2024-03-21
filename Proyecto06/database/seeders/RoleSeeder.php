<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $adminRol = Role::create(['name' => 'admin']);
        // $socioRol = Role::create(['name' => 'socio']);


        // $adminUser = User::create([
        //     'name' => 'Sergio',
        //     'email' => 'administrador@user.com',
        //     'password' => Hash::make('badia123')
        // ]);
        // $socioUser = User::create([
        //     'name' => 'Eric',
        //     'email' => 'socio@user.com',
        //     'password' => Hash::make('badia123')
        // ]);

        // $permisoAdmin = Permission::create(['name' => 'admin']);

        // $permisoView = Permission::create(['name' => 'view']);
        // $permisoComprar = Permission::create(['name' => 'comprar']);

        // $adminRol->givePermissionTo($permisoAdmin);
        // $socioRol->givePermissionTo([$permisoView, $permisoComprar]);

        // Asignar roles al usuario creado
        // $adminUser->assignRole($adminRol);

        // $socioUser->assignRole($socioRol);


        // Crear el rol de administrador si no existe
        //$adminRol = Role::firstOrCreate(['name' => 'admin']);

        // Crear el usuario administrador si no existe
        // $adminUser = User::firstOrCreate(
        //     ['email' => 'administrador@user.com'],
        //     [
        //         'name' => 'Sergio',
        //         'password' => Hash::make('badia123')
        //     ]
        // );

        // // Asignar el rol de administrador al usuario
        // $adminUser->assignRole('admin');


        // !! NUEVA REMESA DE USUARIOS

        // Crear el rol de socio si no existe
        $socioRol = Role::firstOrCreate(['name' => 'socio']);

        // Crear 20 usuarios con el rol de socio
        for ($i = 1; $i <= 20; $i++) {
            $nombreUsuario = 'Usuario' . $i;
            $emailUsuario = 'usuario' . $i . '@example.com';

            // Crear el usuario si no existe
            $usuario = User::firstOrCreate(
                ['email' => $emailUsuario],
                [
                    'name' => $nombreUsuario,
                    'password' => Hash::make('password')
                ]
            );

            // Asignar el rol de socio al usuario
            $usuario->assignRole('socio');
        }
    }
}