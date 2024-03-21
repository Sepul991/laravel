<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'lista usuarios';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('createUsers', ['usuarios' => $users, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nuevoUsuario = new User();

        $nuevoUsuario->name = $request->name;
        $nuevoUsuario->email = $request->email;
        $nuevoUsuario->password = $request->password;
        $nuevoUsuario->direccion = $request->direccion;
        $nuevoUsuario->numeroCuenta = $request->numeroCuenta;
        $nuevoUsuario->fechaInicio = $request->fechaInicio;
        $nuevoUsuario->fechaFin = $request->fechaFin;
        $nuevoUsuario->telefono = $request->telefono;

        $nuevoUsuario->save();

        $nuevoUsuario->assignRole($request->role);

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('editUsers', ['usuario' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->direccion = $request->direccion;
        $user->numeroCuenta = $request->numeroCuenta;
        $user->fechaInicio = $request->fechaInicio;
        $user->fechaFin = $request->fechaFin;
        $user->telefono = $request->telefono;

        $user->save();

        $user->syncRoles([$request->role]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->route('dashboard');
    }
}
