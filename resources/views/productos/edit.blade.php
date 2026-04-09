@extends('layouts.app')
@section('title', 'Editar Productos')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Editar Registo de Productos</h1>
@endsection
@section('content')
<form action="{{ route('productos.update', $producto->id) }}" method="POST" class="max-w-xl mx-auto space-y-6">
    @csrf
    @method('PUT')
    
    <div>
        <label class="field-label">nombre</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">referencia</label>
        <input type="text" name="referencia" value="{{ $producto->referencia }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">subcategoria_id</label>
        <input type="text" name="subcategoria_id" value="{{ $producto->subcategoria_id }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">stock_minimo</label>
        <input type="text" name="stock_minimo" value="{{ $producto->stock_minimo }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">precio_compra</label>
        <input type="text" name="precio_compra" value="{{ $producto->precio_compra }}" required class="field-input">
    </div>
    <div>
        <label class="field-label">precio_venta</label>
        <input type="text" name="precio_venta" value="{{ $producto->precio_venta }}" required class="field-input">
    </div>
    
    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="btn-primary ease-in-out duration-150">
            Actualizar
        </button>
        <a href="{{ route('productos.index') }}" class="text-sm text-slate-400 hover:text-white transition underline">
            Cancelar
        </a>
    </div>
</form>
@endsection