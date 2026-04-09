@extends('layouts.app')
@section('title', 'Facturación')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Registro de Facturas</h1>
    <a href="{{ route('facturas.create') }}" class="btn-primary">
        Generar Factura Manual
    </a>
</div>
@endsection
@section('content')
<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">No. Factura</th>
                <th class="px-4 py-3 font-medium">Fecha Emisión</th>
                <th class="px-4 py-3 font-medium">Cliente</th>
                <th class="px-4 py-3 font-medium">Subtotal</th>
                <th class="px-4 py-3 font-medium">IVA (19%)</th>
                <th class="px-4 py-3 font-medium">Total</th>
                <th class="px-4 py-3 font-medium">Estado</th>
                <th class="px-4 py-3 font-medium text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($facturas as $factura)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 font-semibold text-white">{{ $factura->numero_factura }}</td>
                <td class="px-4 py-3 text-slate-400">{{ $factura->created_at->format('Y-m-d H:i') }}</td>
                <td class="px-4 py-3 text-slate-200">{{ $factura->salida->cliente->nombre }}</td>
                <td class="px-4 py-3 text-slate-400">${{ number_format($factura->subtotal, 2) }}</td>
                <td class="px-4 py-3 text-slate-400">${{ number_format($factura->iva, 2) }}</td>
                <td class="px-4 py-3 font-bold text-white">${{ number_format($factura->total, 2) }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ $factura->estado === 'pagada' ? 'bg-green-100 text-green-800' : ($factura->estado === 'anulada' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($factura->estado) }}
                    </span>
                </td>
                <td class="px-4 py-3 text-right">
                    @if($factura->estado !== 'anulada')
                    <form action="{{ route('facturas.destroy', $factura->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas ANULAR esta factura?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-xs text-red-400 hover:text-red-300 font-semibold underline underline-offset-2">Anular</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($facturas->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay facturas registradas.</div>
@endif
</div>
@endsection
