<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Movimiento;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['proveedor','user'])
                           ->orderByDesc('fecha')->get();
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos   = Producto::where('estado', true)->get();
        return view('entradas.create', compact('proveedores','productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proveedor_id'          => 'required|exists:proveedores,id',
            'fecha'                 => 'required|date',
            'observaciones'         => 'nullable|max:500',
            'productos'             => 'required|array|min:1',
            'productos.*.id'        => 'required|exists:productos,id',
            'productos.*.cantidad'  => 'required|integer|min:1',
            'productos.*.precio'    => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Calcular el total de la entrada
            $total = collect($request->productos)->sum(function ($item) {
                return $item['cantidad'] * $item['precio'];
            });

            // 2. Crear el encabezado de la entrada
            $entrada = Entrada::create([
                'proveedor_id'  => $request->proveedor_id,
                'fecha'         => $request->fecha,
                'observaciones' => $request->observaciones,
                'total'         => $total,
                'user_id'       => auth()->id(),
            ]);

            // 3. Procesar cada producto de la entrada
            foreach ($request->productos as $item) {
                $producto = Producto::find($item['id']);
                $stockAntes = $producto->stock_actual;

                // 3a. Guardar la línea de detalle en la tabla pivote
                $entrada->productos()->attach($item['id'], [
                    'cantidad'        => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                ]);

                // 3b. Actualizar el stock del producto
                $producto->increment('stock_actual', $item['cantidad']);

                // 3c. Registrar el movimiento en la tabla de auditoría
                Movimiento::create([
                    'producto_id'     => $producto->id,
                    'tipo'            => 'entrada',
                    'cantidad'        => $item['cantidad'],
                    'stock_antes'     => $stockAntes,
                    'stock_despues'   => $stockAntes + $item['cantidad'],
                    'referencia_tipo' => 'entrada',
                    'referencia_id'   => $entrada->id,
                    'user_id'         => auth()->id(),
                ]);
            }
        });

        return redirect()->route('entradas.index')
                         ->with('success', 'Entrada registrada y stock actualizado.');
    }

    public function show(Entrada $entrada)
    {
        $entrada->load('proveedor','user','productos');
        return view('entradas.show', compact('entrada'));
    }
}
