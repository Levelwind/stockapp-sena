@extends('layouts.app')
@section('title', 'Generar Factura')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Generar Factura a partir de Salida</h1>
@endsection
@section('content')
<form action="{{ route('facturas.store') }}" method="POST" class="max-w-xl mx-auto space-y-6">
    @csrf
    <div>
        <label class="field-label">Seleccionar Salida no facturada:</label>
        <select name="salida_id" required class="field-input">
            <option value="">-- Seleccione una Salida --</option>
            @foreach($salidas as $sal)
                <option value="{{ $sal->id }}" {{ (isset($selectedSalida) && $selectedSalida == $sal->id) ? 'selected' : '' }}>
                    Salida #{{ $sal->id }} - {{ $sal->cliente->nombre }} - ${{ number_format($sal->total, 2) }}
                </option>
            @endforeach
        </select>
    </div>
    
    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gray-900 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-gray-800 transition">
            Emitir Factura
        </button>
        <a href="{{ route('facturas.index') }}" class="text-sm font-medium text-slate-400 hover:text-white transition underline underline-offset-2">Cancelar</a>
    </div>
</form>
@endsection
