<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre','referencia','subcategoria_id',
        'stock_actual','stock_minimo',
        'precio_compra','precio_venta','estado'
    ];
    protected $table = 'productos';

    public function subcategoria() {
        return $this->belongsTo(Subcategoria::class);
    }

    public function entradas() {
        return $this->belongsToMany(Entrada::class, 'entrada_producto')
                    ->withPivot('cantidad','precio_unitario');
    }

    public function salidas() {
        return $this->belongsToMany(Salida::class, 'salida_producto')
                    ->withPivot('cantidad','precio_unitario');
    }

    public function movimientos() {
        return $this->hasMany(Movimiento::class);
    }

    public function scopeStockCritico($query) {
        return $query->whereColumn('stock_actual', '<', 'stock_minimo');
    }
}
