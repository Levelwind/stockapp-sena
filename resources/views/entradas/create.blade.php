@extends('layouts.app')
@section('title','Registrar Entrada')
@section('header')
<h1 class="text-2xl font-semibold text-white tracking-tight">Registrar Entrada de Productos</h1>
@endsection
@section('content')

<form method="POST" action="{{ route('entradas.store') }}" class="space-y-6">
    @csrf
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-white/[0.04] border border-white/10 rounded-xl">
        <div>
            <label class="field-label">Proveedor:</label>
            <select name="proveedor_id" required class="field-input">
                <option value="">-- Seleccione --</option>
                @foreach($proveedores as $prov)
                    <option value="{{ $prov->id }}">{{ $prov->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="field-label">Fecha:</label>
            <input type="date" name="fecha" value="{{ date('Y-m-d') }}" required class="field-input">
        </div>
        <div class="md:col-span-2">
            <label class="field-label">Observaciones:</label>
            <textarea name="observaciones" rows="2" class="field-input"></textarea>
        </div>
    </div>

    <div>
        <div class="flex items-center justify-between mb-2">
            <h3 class="text-lg font-semibold text-white">Productos</h2>
            <button type="button" onclick="agregarFila()" class="inline-flex items-center px-3 py-1.5 bg-bento-card border border-white/10 rounded-md shadow-sm text-xs font-semibold tracking-wide text-slate-300 hover:bg-white/[0.04] focus:outline-none transition">
                + Agregar Fila
            </button>
        </div>
        
        <div class="overflow-hidden border border-white/10 rounded-xl">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white/[0.04] text-xs text-slate-400 uppercase font-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">Producto</th>
                        <th scope="col" class="px-6 py-3 text-left w-32">Cantidad</th>
                        <th scope="col" class="px-6 py-3 text-left w-48">Costo Unitario ($)</th>
                        <th scope="col" class="px-6 py-3 text-right"></th>
                    </tr>
                </thead>
                <tbody id="filas-productos" class="bg-bento-card divide-y divide-gray-200">
                    <!-- Las filas se agregan con JavaScript -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex items-center gap-4 pt-4 border-t border-white/10">
        <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-gray-900 border border-transparent rounded-lg font-semibold text-sm text-white hover:bg-gray-800 transition">
            Guardar Entrada
        </button>
        <a href="{{ route('entradas.index') }}" class="text-sm font-medium text-slate-400 hover:text-white transition underline underline-offset-2">Cancelar</a>
    </div>
</form>

<script>
// Datos de productos desde PHP a JavaScript
const productos = @json($productos);
let contador = 0;

function agregarFila() {
    const i = contador++;
    const opciones = productos.map(p =>
        \`<option value='\${p.id}'>\${p.nombre} (\${p.referencia}) — Stock: \${p.stock_actual}</option>\`
    ).join('');

    const fila = \`
        <tr id='fila-\${i}' class="hover:bg-white/[0.02] transition">
            <td class="px-6 py-3">
                <select name='productos[\${i}][id]' required class="block w-full rounded-md border-white/10 py-1.5 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value=''>-- Seleccione --</option>
                    \${opciones}
                </select>
            </td>
            <td class="px-6 py-3">
                <input type='number' name='productos[\${i}][cantidad]' min='1' value='1' required class="block w-full rounded-md border-white/10 py-1.5 text-sm">
            </td>
            <td class="px-6 py-3">
                <div class="relative rounded-md shadow-sm">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-slate-400 sm:text-sm">$</span>
                    </div>
                    <input type='number' name='productos[\${i}][precio]' min='0' step='0.01' required class="block w-full rounded-md border-white/10 pl-7 py-1.5 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
            </td>
            <td class="px-6 py-3 text-right">
                <button type='button' onclick='document.getElementById("fila-\${i}").remove()' class='text-red-500 hover:text-red-700 bg-red-50 hover:bg-red-100 rounded-md px-2 py-1 transition text-xs font-semibold'>✕ Eliminar</button>
            </td>
        </tr>\`;
    document.getElementById('filas-productos').insertAdjacentHTML('beforeend', fila);
}

// Agrega una fila inicial automáticamente
document.addEventListener('DOMContentLoaded', () => {
    agregarFila();
});
</script>
@endsection
