@extends('layouts.app')
@section('title', 'Editar Clientes')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Editar Registo de Clientes</h1>
@endsection
@section('content')
<form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="max-w-xl mx-auto space-y-6">
    @csrf
    @method('PUT')
    
    <div>
        <label class="field-label">nombre</label>
        <input type="text" name="nombre" value="{{ $cliente->nombre }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">documento</label>
        <input type="text" name="documento" value="{{ $cliente->documento }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">tipo_documento</label>
        <input type="text" name="tipo_documento" value="{{ $cliente->tipo_documento }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">telefono</label>
        <input type="text" name="telefono" value="{{ $cliente->telefono }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">ciudad</label>
        <input type="text" name="ciudad" value="{{ $cliente->ciudad }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">email</label>
        <input type="text" name="email" value="{{ $cliente->email }}" required class="field-input">
    </div>
    
    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="btn-primary ease-in-out duration-150">
            Actualizar
        </button>
        <a href="{{ route('clientes.index') }}" class="text-sm text-slate-400 hover:text-white transition underline">
            Cancelar
        </a>
    </div>
</form>
@endsection