<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount('subcategorias')->get();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'      => 'required|max:100|unique:categorias',
            'descripcion' => 'nullable|max:500',
        ]);
        Categoria::create($request->all());
        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada correctamente.');
    }

    public function show(Categoria $categoria)
    {
        // unused in this simplified guide
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre'      => 'required|max:100|unique:categorias,nombre,'.$categoria->id,
            'descripcion' => 'nullable|max:500',
        ]);
        $categoria->update($request->all());
        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria)
    {
        if ($categoria->subcategorias()->count() > 0) {
            return redirect()->route('categorias.index')
                             ->with('error', 'No puedes eliminar una categoría con subcategorías asociadas.');
        }
        $categoria->delete();
        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría eliminada.');
    }
}
