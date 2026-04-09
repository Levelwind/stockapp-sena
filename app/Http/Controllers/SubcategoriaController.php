<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('subcategorias.index', compact('subcategorias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('subcategorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'       => 'required|max:100',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion'  => 'nullable|max:500',
        ]);
        Subcategoria::create($request->all());
        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría creada.');
    }

    public function show(Subcategoria $subcategoria) {}

    public function edit(Subcategoria $subcategoria)
    {
        $categorias = Categoria::all();
        return view('subcategorias.edit', compact('subcategoria','categorias'));
    }

    public function update(Request $request, Subcategoria $subcategoria)
    {
        $request->validate([
            'nombre'       => 'required|max:100',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion'  => 'nullable|max:500',
        ]);
        $subcategoria->update($request->all());
        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría actualizada.');
    }

    public function destroy(Subcategoria $subcategoria)
    {
        if ($subcategoria->productos()->count() > 0) {
            return redirect()->route('subcategorias.index')
                 ->with('error', 'No puedes eliminar una subcategoría con productos.');
        }
        $subcategoria->delete();
        return redirect()->route('subcategorias.index')
                         ->with('success', 'Subcategoría eliminada.');
    }
}
