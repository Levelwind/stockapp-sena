<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::withCount('salidas')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'         => 'required|max:150',
            'documento'      => 'required|max:20|unique:clientes',
            'tipo_documento' => 'nullable|max:20',
            'telefono'       => 'nullable|max:20',
            'ciudad'         => 'nullable|max:80',
            'email'          => 'nullable|email|max:100',
        ]);
        Cliente::create($request->all());
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente registrado.');
    }

    public function show(Cliente $cliente) {}

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre'         => 'required|max:150',
            'documento'      => 'required|max:20|unique:clientes,documento,'.$cliente->id,
            'tipo_documento' => 'nullable|max:20',
            'telefono'       => 'nullable|max:20',
            'ciudad'         => 'nullable|max:80',
            'email'          => 'nullable|email|max:100',
        ]);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado.');
    }

    public function destroy(Cliente $cliente)
    {
        if ($cliente->salidas()->count() > 0) {
            return redirect()->route('clientes.index')
                 ->with('error', 'No puedes eliminar un cliente con salidas registradas.');
        }
        $cliente->delete();
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente eliminado.');
    }
}
