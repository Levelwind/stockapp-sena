<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Salida;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with('salida.cliente')->orderBy('created_at', 'desc')->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create(Request $request)
    {
        $salidas = Salida::doesntHave('factura')->get();
        $selectedSalida = $request->query('salida_id');
        return view('facturas.create', compact('salidas', 'selectedSalida'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'salida_id' => 'required|exists:salidas,id|unique:facturas,salida_id',
        ]);

        $salida = Salida::find($request->salida_id);
        
        $subtotal = $salida->total; // asumiremos total sin iva por simplificacion
        $iva = $subtotal * 0.19; // 19% IVA
        $total = $subtotal + $iva;

        $numeroFactura = 'FACT-' . str_pad(Factura::count() + 1, 6, '0', STR_PAD_LEFT);

        Factura::create([
            'salida_id' => $salida->id,
            'numero_factura' => $numeroFactura,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'estado' => 'pagada'
        ]);

        return redirect()->route('facturas.index')->with('success', 'Factura generada exitosamente.');
    }

    public function show(Factura $factura)
    {
        $factura->load('salida.cliente', 'salida.productos');
        return view('facturas.show', compact('factura'));
    }

    public function destroy(Factura $factura)
    {
        $factura->update(['estado' => 'anulada']);
        return redirect()->route('facturas.index')->with('success', 'Factura anulada.');
    }
}
