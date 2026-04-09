@extends('layouts.app')
@section('title', 'Nuevo Categorias')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Crear Registo de Categorias</h1>
@endsection
@section('content')
<form action="{{ route('categorias.store') }}" method="POST" class="max-w-xl mx-auto space-y-6">
    @csrf
    
    <div>
        <label class="field-label">nombre</label>
        <input type="text" name="nombre" required class="field-input">
    </div>
    <div>
        <label class="field-label">descripcion</label>
        <input type="text" name="descripcion" required class="field-input">
    </div>
    
    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="btn-primary ease-in-out duration-150">
            Guardar
        </button>
        <a href="{{ route('categorias.index') }}" class="text-sm text-slate-400 hover:text-white transition underline">
            Cancelar
        </a>
    </div>
</form>
@endsection