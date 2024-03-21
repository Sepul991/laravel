<?php

use App\Http\Controllers\CategoriaProductoController;
use App\Http\Controllers\ClaseDiariaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InfoBancariaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RegistroAltaController;
use App\Http\Controllers\RegistroPersonalController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Vistas que puedo necesitar
Route::resource('/categoria', CategoriaProductoController::class);
Route::resource('/', ClaseDiariaController::class);
Route::resource('/', FacturaController::class);
Route::resource('/', InfoBancariaController::class);
Route::resource('/', ProfileController::class);
Route::resource('/productos', ProductoController::class)->middleware(['auth', 'verified', 'role:admin']);;
Route::resource('/', ProveedorController::class);
Route::resource('/', RegistroAltaController::class);
Route::resource('/', RegistroPersonalController::class);
Route::resource('/', TarifaController::class);
Route::resource('/visitas', VisitaController::class)->middleware(['auth', 'verified', 'role:admin']); //, 'role:socio']
Route::resource('/users', UserController::class)->middleware(['auth', 'verified', 'role:admin']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User::all();
    $roles = Role::all();
    $productos = Producto::all();
    $proveedores = Proveedor::all();
    return view('dashboard', ['usuarios' => $users, 'roles' => $roles, 'productos' => $productos, 'proveedores' => $proveedores]);
})->middleware(['auth', 'verified', 'role:admin'])->name('dashboard');


Route::get('/users/{id}/edit', function () {
    $users = User::all();
    $roles = Role::all();
    return view('editUsers', ['usuarios' => $users, 'roles' => $roles]);
})->middleware(['auth', 'verified', 'role:admin']);


Route::get('/productos/{id}/edit', function ($id) {
    $producto = Producto::findOrFail($id);
    $proveedores = Proveedor::all();
    return view('editProductos', ['producto' => $producto, 'proveedores' => $proveedores]);
})->middleware(['auth', 'verified', 'role:admin']);

// Route::get('/productos/{id}', function ($id) {
//     $producto = Producto::findOrFail($id);
//     $proveedores = Proveedor::all();
//     return view('editProductos', ['producto' => $producto, 'proveedores' => $proveedores]);
// })->middleware(['auth', 'verified', 'role:admin']);

Route::get('/visitas', function () {
    //
    return view('visitas');
})->middleware(['auth', 'verified', 'role:admin', 'role:socio']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
