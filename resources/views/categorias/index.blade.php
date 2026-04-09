@extends('layouts.app')
@section('title', 'Categorias')
@section('header')
<div class="flex justify-between items-center">
    <h1 class="text-2xl font-semibold text-white tracking-tight">Categorias</h1>
    <a href="{{ route('categorias.create') }}" class="btn-primary">
        Registrar Nuevo
    </a>
</div>
@endsection
@section('content')
<div class="surface-card overflow-x-auto">
    <table class="w-full text-sm text-left border-collapse">
        <thead class="text-xs text-slate-400 uppercase bg-white/[0.04] border-b border-white/10">
            <tr>
                <th class="px-4 py-3 font-medium">nombre</th><th class="px-4 py-3 font-medium">descripcion</th>
                <th class="px-4 py-3 font-medium text-right">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @foreach($categorias as $item)
            <tr class="hover:bg-white/[0.02] transition-colors">
                <td class="px-4 py-3 text-white">{{ $item->nombre }}</td><td class="px-4 py-3 text-white">{{ $item->descripcion }}</td>
                <td class="px-4 py-3 text-right">
                    <a href="{{ route('categorias.edit', $item->id) }}" class="text-bento-highlight hover:text-emerald-300 font-medium mr-3">Editar</a>
                    <form action="{{ route('categorias.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Seguro que deseas eliminar esto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@if($categorias->isEmpty())
    <div class="text-center py-8 text-slate-400 bg-slate-900/40">No hay registros almacenados.</div>
@endif
</div>
@endsection