@extends('layouts.app')
@section('title', 'Historial de Entradas')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Entradas Registradas</h1>
    <a href="{{ route('entradas.create') }}" class="btn-primary">
        Nueva Entrada
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
                <th class="px-4 py-3 font-medium">Proveedor</th>
                <th class="px-4 py-3 font-medium">Observaciones</th>
                <th class="px-4 py-3 font-medium">Total</th>
                <th class="px-4 py-3 font-medium text-right">Usuario</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($entradas as $ent)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-slate-400 font-medium">#{{ $ent->id }}</td>
                <td class="px-4 py-3 text-white">{{ $ent->fecha }}</td>
                <td class="px-4 py-3 font-medium text-slate-200">{{ $ent->proveedor->nombre }}</td>
                <td class="px-4 py-3 text-slate-400 truncate max-w-xs">{{ $ent->observaciones ?? '-' }}</td>
                <td class="px-4 py-3 font-bold text-white">${{ number_format($ent->total, 2) }}</td>
                <td class="px-4 py-3 text-right text-sm text-slate-400">{{ $ent->user->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($entradas->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay entradas registradas.</div>
@endif
</div>
@endsection
