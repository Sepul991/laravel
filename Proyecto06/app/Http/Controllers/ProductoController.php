<?php

namespace App\Http\Controllers;

use App\Models\CategoriaProducto;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $proveedores = Proveedor::all();
        $categoriasProductos = CategoriaProducto::all();
        $productos = Producto::all();
        return view('productos', ['proveedores' => $proveedores, 'categorias' => $categoriasProductos, 'productos' => $productos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nuevoProducto = new Producto();

        $nuevoProducto->nombreProducto = $request->name;
        $nuevoProducto->descripcionProducto = $request->productDescription;
        $nuevoProducto->precioUnitario = $request->price;
        $nuevoProducto->stockMin = $request->stockMin;
        $nuevoProducto->stockActual = $request->stockActual;
        $nuevoProducto->nombreProducto = $request->name;

        $nuevoProducto->proveedorPreferido = $request->proveedorHabitual;
        $nuevoProducto->categoria_productos_id = $request->categoriaProducto;

        $nuevoProducto->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        // $proveedores = Proveedor::all();
        // $categoriaProductos = CategoriaProducto::all();
        // $producto = Producto::findOrFail($producto);

        // return view('editProductos', ['productos' => $producto, 'proveedores' => $proveedores, 'categoriaProductos' => $categoriaProductos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($producto)
    {
        //
        $proveedores = Proveedor::all();
        $categoriaProductos = CategoriaProducto::all();
        $producto = Producto::find($producto);
        return view('editProductos', ['producto' => $producto, 'proveedores' => $proveedores, 'categoriaProductos' => $categoriaProductos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //

        $producto->nombreProducto = $request->name;
        $producto->descripcionProducto = $request->productDescription;
        $producto->precioUnitario = $request->price;
        $producto->stockMin = $request->stockMin;
        $producto->stockActual = $request->stockActual;
        $producto->proveedorPreferido = $request->proveedorHabitual;
        $producto->categoria_productos_id = $request->categoriaProducto;

        // dd($request->all());
        // dd($producto->all());
        $producto->save();

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();

        return redirect()->route('dashboard');
    }
}
