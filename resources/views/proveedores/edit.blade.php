@extends('layouts.app')
@section('title', 'Editar Proveedores')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Editar Registo de Proveedores</h1>
@endsection
@section('content')
<form action="{{ route('proveedores.update', $proveedore->id) }}" method="POST" class="max-w-xl mx-auto space-y-6">
    @csrf
    @method('PUT')
    
    <div>
        <label class="field-label">nombre</label>
        <input type="text" name="nombre" value="{{ $proveedore->nombre }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">nit</label>
        <input type="text" name="nit" value="{{ $proveedore->nit }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">telefono</label>
        <input type="text" name="telefono" value="{{ $proveedore->telefono }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">ciudad</label>
        <input type="text" name="ciudad" value="{{ $proveedore->ciudad }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">email</label>
        <input type="text" name="email" value="{{ $proveedore->email }}" required class="field-input">
    </div>
    
    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="btn-primary ease-in-out duration-150">
            Actualizar
        </button>
        <a href="{{ route('proveedores.index') }}" class="text-sm text-slate-400 hover:text-white transition underline">
            Cancelar
        </a>
    </div>
</form>
@endsection