<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fecha', 'cliente_id',
        'observaciones', 'total', 'user_id'
    ];
    protected $table = 'salidas';

    public function user() {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function productos() {
        return $this->belongsToMany(Producto::class, 'salida_producto')
                    ->withPivot('cantidad','precio_unitario');
    }

    public function factura() {
        return $this->hasOne(Factura::class);
    }
}
