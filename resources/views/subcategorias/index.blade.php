@extends('layouts.app')
@section('title', 'Subcategorias')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Subcategorias</h1>
    <a href="{{ route('subcategorias.create') }}" class="btn-primary">
        Registrar Nuevo
    </a>
</div>
@endsection
@section('content')
<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">nombre</th><th class="px-4 py-3 font-medium">categoria_id</th><th class="px-4 py-3 font-medium">descripcion</th>
                <th class="px-4 py-3 font-medium text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($subcategorias as $item)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-white">{{ $item->nombre }}</td><td class="px-4 py-3 text-white">{{ $item->categoria_id }}</td><td class="px-4 py-3 text-white">{{ $item->descripcion }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('subcategorias.edit', $item->id) }}" class="text-bento-highlight hover:text-emerald-300 font-medium mr-3">Editar</a>
                    <form action="{{ route('subcategorias.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($subcategorias->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay registros almacenados.</div>
@endif
</div>
@endsection