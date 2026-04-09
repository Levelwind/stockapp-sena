@extends('layouts.app')
@section('title', 'Historial de Salidas')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Salidas Registradas (Ventas)</h1>
    <a href="{{ route('salidas.create') }}" class="btn-primary">
        Nueva Salida
    </a>
</div>
@endsection
@section('content')
<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">ID</th>
                <th class="px-4 py-3 font-medium">Fecha</th>
                <th class="px-4 py-3 font-medium">Cliente</th>
                <th class="px-4 py-3 font-medium">Observaciones</th>
                <th class="px-4 py-3 font-medium">Total</th>
                <th class="px-4 py-3 font-medium text-right">Factura / Usuario</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($salidas as $salida)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-slate-400 font-medium">#{{ $salida->id }}</td>
                <td class="px-4 py-3 text-white">{{ $salida->fecha }}</td>
                <td class="px-4 py-3 font-medium text-slate-200">{{ $salida->cliente->nombre }}</td>
                <td class="px-4 py-3 text-slate-400 truncate max-w-xs">{{ $salida->observaciones ?? '-' }}</td>
                <td class="px-4 py-3 font-bold text-white">${{ number_format($salida->total, 2) }}</td>
                <td class="px-4 py-3 text-right">
                    @if(empty($salida->factura))
                    <a href="{{ route('facturas.create', ['salida_id' => $salida->id]) }}" class="text-xs text-bento-highlight font-semibold hover:text-emerald-300 mr-2">Generar Factura</a>
                    @else
                    <span class="text-xs font-semibold text-slate-500 mr-2">Facturado</span>
                    @endif
                    <span class="text-xs text-slate-400 ml-2">Por: {{ $salida->user->name }}</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($salidas->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay salidas registradas.</div>
@endif
</div>
@endsection
