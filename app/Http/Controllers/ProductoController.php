<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('subcategoria.categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('productos.create', compact('subcategorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|max:150',
            'referencia'     => 'required|max:50|unique:productos',
            'subcategoria_id'=> 'required|exists:subcategorias,id',
            'stock_minimo'   => 'required|integer|min:0',
            'precio_compra'  => 'required|numeric|min:0',
            'precio_venta'   => 'required|numeric|min:0',
        ]);

        Producto::create(array_merge($request->all(), ['stock_actual' => 0]));
        return redirect()->route('productos.index')
                         ->with('success', 'Producto registrado.');
    }

    public function show(Producto $producto) {}

    public function edit(Producto $producto)
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('productos.edit', compact('producto','subcategorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre'         => 'required|max:150',
            'referencia'     => 'required|max:50|unique:productos,referencia,'.$producto->id,
            'subcategoria_id'=> 'required|exists:subcategorias,id',
            'stock_minimo'   => 'required|integer|min:0',
            'precio_compra'  => 'required|numeric|min:0',
            'precio_venta'   => 'required|numeric|min:0',
        ]);
        
        $producto->update($request->except(['stock_actual']));
        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado.');
    }

    public function destroy(Producto $producto)
    {
        if ($producto->movimientos()->count() > 0) {
            return redirect()->route('productos.index')
                 ->with('error', 'No puedes eliminar un producto con movimientos registrados.');
        }
        $producto->delete();
        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado.');
    }
}
