<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'producto_id','tipo','cantidad',
        'stock_antes','stock_despues',
        'referencia_tipo','referencia_id','user_id'
    ];
    protected $table = 'movimientos';

    public function producto() {
        return $this->belongsTo(Producto::class);
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }
}
