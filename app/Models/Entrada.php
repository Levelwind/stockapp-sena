<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;
    
    protected $fillable = ['proveedor_id', 'fecha', 'observaciones', 'total', 'user_id'];
    protected $table = 'entradas';

    public function proveedor() {
        return $this->belongsTo(Proveedor::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function productos() {
        return $this->belongsToMany(Producto::class, 'entrada_producto')
                    ->withPivot('cantidad','precio_unitario');
    }
}
