<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FacturaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $totalProductos  = \App\Models\Producto::count();
        $stockCritico    = \App\Models\Producto::stockCritico()->count();
        $totalEntradas   = \App\Models\Entrada::count();
        $totalSalidas    = \App\Models\Salida::count();
        $stockCriticoList = \App\Models\Producto::stockCritico()->get();
        $ultimosMov = \App\Models\Movimiento::with(['producto','user'])
                            ->orderByDesc('created_at')->take(5)->get();
        return view('dashboard', compact('totalProductos', 'stockCritico', 'totalEntradas', 'totalSalidas', 'ultimosMov', 'stockCriticoList'));
    })->name('dashboard');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('subcategorias', SubcategoriaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('entradas', EntradaController::class);
    Route::resource('salidas', SalidaController::class);
    Route::resource('facturas', FacturaController::class);

    Route::get('movimientos', [MovimientoController::class, 'index'])->name('movimientos.index');
    Route::get('movimientos/{movimiento}', [MovimientoController::class, 'show'])->name('movimientos.show');

    // Reportes adicionales sugeridos en la guía
    Route::get('/reportes/inventario', function () {
        $productos = \App\Models\Producto::orderBy('nombre')->get();
        return view('reportes.inventario', compact('productos'));
    })->name('reportes.inventario');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
