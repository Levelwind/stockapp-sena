@extends('layouts.app')
@section('title', 'Productos')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn-primary">
        Registrar Nuevo
    </a>
</div>
@endsection
@section('content')
<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">nombre</th><th class="px-4 py-3 font-medium">referencia</th><th class="px-4 py-3 font-medium">subcategoria_id</th><th class="px-4 py-3 font-medium">stock_minimo</th><th class="px-4 py-3 font-medium">precio_compra</th><th class="px-4 py-3 font-medium">precio_venta</th>
                <th class="px-4 py-3 font-medium text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($productos as $item)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-white">{{ $item->nombre }}</td><td class="px-4 py-3 text-white">{{ $item->referencia }}</td><td class="px-4 py-3 text-white">{{ $item->subcategoria_id }}</td><td class="px-4 py-3 text-white">{{ $item->stock_minimo }}</td><td class="px-4 py-3 text-white">{{ $item->precio_compra }}</td><td class="px-4 py-3 text-white">{{ $item->precio_venta }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('productos.edit', $item->id) }}" class="text-bento-highlight hover:text-emerald-300 font-medium mr-3">Editar</a>
                    <form action="{{ route('productos.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($productos->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay registros almacenados.</div>
@endif
</div>
@endsection