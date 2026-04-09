<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::withCount('entradas')->get();
        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|max:150',
            'nit'      => 'required|max:20|unique:proveedores',
            'telefono' => 'nullable|max:20',
            'ciudad'   => 'nullable|max:80',
            'email'    => 'nullable|email|max:100',
        ]);
        Proveedor::create($request->all());
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor registrado.');
    }

    public function show(Proveedor $proveedor) {}

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre'   => 'required|max:150',
            'nit'      => 'required|max:20|unique:proveedores,nit,'.$proveedor->id,
            'telefono' => 'nullable|max:20',
            'ciudad'   => 'nullable|max:80',
            'email'    => 'nullable|email|max:100',
        ]);
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor actualizado.');
    }

    public function destroy(Proveedor $proveedor)
    {
        if ($proveedor->entradas()->count() > 0) {
            return redirect()->route('proveedores.index')
                 ->with('error', 'No puedes eliminar un proveedor con entradas registradas.');
        }
        $proveedor->delete();
        return redirect()->route('proveedores.index')
                         ->with('success', 'Proveedor eliminado.');
    }
}
