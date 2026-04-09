@extends('layouts.app')
@section('title', 'Reporte de Inventario')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Reporte de Nivel de Inventario</h1>
    <button onclick="window.print()" class="btn-primary">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
        Imprimir
    </button>
</div>
@endsection
@section('content')

<div class="overflow-x-auto print:static print:w-full">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">Referencia</th>
                <th class="px-4 py-3 font-medium">Producto</th>
                <th class="px-4 py-3 font-medium">Categoría / Sub</th>
                <th class="px-4 py-3 font-medium text-right">Precio Venta</th>
                <th class="px-4 py-3 font-medium text-center">Stock Mínimo</th>
                <th class="px-4 py-3 font-medium text-center border-l border-white/10">Stock Actual</th>
                <th class="px-4 py-3 font-medium">Estado</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($productos as $prod)
            @php $critico = $prod->stock_actual < $prod->stock_minimo; @endphp
            <tr class="hover:bg-white/[0.02] transition-colors {{ $critico ? 'bg-red-50/20' : '' }}">
                <td class="px-4 py-3 text-slate-400 font-mono text-xs">{{ $prod->referencia }}</td>
                <td class="px-4 py-3 font-medium text-white">{{ $prod->nombre }}</td>
                <td class="px-4 py-3 text-slate-400 text-xs">
                    {{ $prod->subcategoria->categoria->nombre }} / {{ $prod->subcategoria->nombre }}
                </td>
                <td class="px-4 py-3 text-right text-slate-300 font-medium">${{ number_format($prod->precio_venta, 2) }}</td>
                <td class="px-4 py-3 text-center text-slate-400">{{ $prod->stock_minimo }}</td>
                <td class="px-4 py-3 text-center border-l {{ $critico ? 'border-red-200 font-bold text-red-400' : 'border-white/10 font-semibold text-white' }}">
                    {{ $prod->stock_actual }}
                </td>
                <td class="px-4 py-3">
                    @if($critico)
                        <span class="px-2 py-1 text-[10px] font-bold rounded-full bg-red-100 text-red-800 uppercase tracking-wider">Crítico</span>
                    @else
                        <span class="px-2 py-1 text-[10px] font-bold rounded-full bg-green-100 text-green-800 uppercase tracking-wider">Suficiente</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<style>
@media print {
    body * { visibility: hidden; }
    main, main *, .print\:static { visibility: visible; }
    main { position: absolute; left: 0; top: 0; width: 100%; border: none; box-shadow: none; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border-bottom: 1px solid #e5e7eb; padding: 0.5rem; text-align: left; }
}
</style>
@endsection
