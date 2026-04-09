<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\Producto;
use App\Models\Movimiento;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::with('user', 'cliente')->orderByDesc('fecha')->get();
        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        $productos = Producto::where('estado', true)
                             ->where('stock_actual', '>', 0)->get();
        $clientes = Cliente::all();
        return view('salidas.create', compact('productos', 'clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha'                 => 'required|date',
            'cliente_id'            => 'required|exists:clientes,id',
            'observaciones'         => 'nullable|max:500',
            'productos'             => 'required|array|min:1',
            'productos.*.id'        => 'required|exists:productos,id',
            'productos.*.cantidad'  => 'required|integer|min:1',
            'productos.*.precio'    => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Verificar que hay stock suficiente para cada producto
            foreach ($request->productos as $item) {
                $producto = Producto::find($item['id']);
                if ($producto->stock_actual < $item['cantidad']) {
                    throw new \Exception(
                        'Stock insuficiente para: ' . $producto->nombre .
                        '. Disponible: ' . $producto->stock_actual
                    );
                }
            }

            // 2. Calcular total
            $total = collect($request->productos)->sum(fn($i) => $i['cantidad'] * $i['precio']);

            // 3. Crear la salida
            $salida = Salida::create([
                'fecha'              => $request->fecha,
                'cliente_id'         => $request->cliente_id,
                'observaciones'      => $request->observaciones,
                'total'              => $total,
                'user_id'            => auth()->id(),
            ]);

            // 4. Procesar cada producto
            foreach ($request->productos as $item) {
                $producto = Producto::find($item['id']);
                $stockAntes = $producto->stock_actual;

                $salida->productos()->attach($item['id'], [
                    'cantidad'        => $item['cantidad'],
                    'precio_unitario' => $item['precio'],
                ]);

                // Decrementar el stock
                $producto->decrement('stock_actual', $item['cantidad']);

                // Registrar en auditoría
                Movimiento::create([
                    'producto_id'     => $producto->id,
                    'tipo'            => 'salida',
                    'cantidad'        => $item['cantidad'],
                    'stock_antes'     => $stockAntes,
                    'stock_despues'   => $stockAntes - $item['cantidad'],
                    'referencia_tipo' => 'salida',
                    'referencia_id'   => $salida->id,
                    'user_id'         => auth()->id(),
                ]);
            }
        });

        return redirect()->route('salidas.index')
                         ->with('success', 'Salida registrada y stock actualizado.');
    }

    public function show(Salida $salida)
    {
        $salida->load('user','productos', 'cliente');
        return view('salidas.show', compact('salida'));
    }
}
