@extends('layouts.app')
@section('title', 'Reporte de Auditoría: Movimientos')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Auditoría de Inventario (Movimientos)</h1>
@endsection
@section('content')

<!-- Filtros -->
<div class="mb-6 bg-white/[0.04] p-4 rounded-xl border border-white/10">
    <form method="GET" action="{{ route('movimientos.index') }}" class="flex flex-wrap gap-4 items-end">
        <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">Tipo</label>
            <select name="tipo" class="mt-1 block w-40 rounded-md border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Todos</option>
                <option value="entrada" {{ request('tipo') == 'entrada' ? 'selected' : '' }}>Entradas</option>
                <option value="salida" {{ request('tipo') == 'salida' ? 'selected' : '' }}>Salidas</option>
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">Producto</label>
            <select name="producto_id" class="mt-1 block w-48 rounded-md border-white/10 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                <option value="">Cualquiera</option>
                @foreach($productos as $p)
                    <option value="{{ $p->id }}" {{ request('producto_id') == $p->id ? 'selected' : '' }}>{{ $p->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">Desde</label>
            <input type="date" name="desde" value="{{ request('desde') }}" class="mt-1 block rounded-md border-white/10 shadow-sm focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <label class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">Hasta</label>
            <input type="date" name="hasta" value="{{ request('hasta') }}" class="mt-1 block rounded-md border-white/10 shadow-sm focus:border-indigo-500 sm:text-sm">
        </div>
        <div>
            <button type="submit" class="px-4 py-2 bg-gray-900 border border-transparent rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-800 transition">Filtrar</button>
            <a href="{{ route('movimientos.index') }}" class="ml-2 px-4 py-2 border border-white/10 rounded-md font-medium text-xs text-slate-300 hover:bg-white/[0.08] transition">Limpiar</a>
        </div>
    </form>
</div>

<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-bento-card border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">Fecha y Hora</th>
                <th class="px-4 py-3 font-medium">Tipo</th>
                <th class="px-4 py-3 font-medium">Producto</th>
                <th class="px-4 py-3 font-medium">Cantidad</th>
                <th class="px-4 py-3 font-medium">Stock Anterior</th>
                <th class="px-4 py-3 font-medium">Stock Nuevo</th>
                <th class="px-4 py-3 font-medium">Ref. Origen</th>
                <th class="px-4 py-3 font-medium text-right">Usuario</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($movimientos as $mov)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-slate-400 whitespace-nowrap">{{ $mov->created_at->format('Y-m-d H:i:s') }}</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $mov->tipo === 'entrada' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                        {{ strtoupper($mov->tipo) }}
                    </span>
                </td>
                <td class="px-4 py-3 text-white font-medium">{{ $mov->producto->nombre }}</td>
                <td class="px-4 py-3 text-white font-bold font-mono">{{ $mov->tipo === 'entrada' ? '+' : '-' }}{{ $mov->cantidad }}</td>
                <td class="px-4 py-3 text-slate-400">{{ $mov->stock_antes }}</td>
                <td class="px-4 py-3 text-white font-semibold">{{ $mov->stock_despues }}</td>
                <td class="px-4 py-3 text-slate-400">{{ ucfirst($mov->referencia_tipo) }} #{{ $mov->referencia_id }}</td>
                <td class="px-4 py-3 text-right text-xs text-slate-400">{{ $mov->user->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    
    <div class="mt-4">
        {{ $movimientos->links() }}
    </div>

@if($movimientos->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay movimientos registrados que coincidan con la búsqueda.</div>
@endif
</div>
@endsection
