<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index(Request $request)
    {
        $query = Movimiento::with(['producto','user']);

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }
        if ($request->filled('producto_id')) {
            $query->where('producto_id', $request->producto_id);
        }
        if ($request->filled('desde')) {
            $query->whereDate('created_at', '>=', $request->desde);
        }
        if ($request->filled('hasta')) {
            $query->whereDate('created_at', '<=', $request->hasta);
        }

        $movimientos = $query->orderByDesc('created_at')->paginate(20);
        $productos   = Producto::all();

        return view('movimientos.index', compact('movimientos','productos'));
    }

    public function show(Movimiento $movimiento)
    {
        $movimiento->load('producto','user');
        return view('movimientos.show', compact('movimiento'));
    }
}
