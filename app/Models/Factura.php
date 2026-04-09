<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $fillable = ['salida_id', 'numero_factura', 'subtotal', 'iva', 'total', 'estado'];
    protected $table = 'facturas';

    public function salida() {
        return $this->belongsTo(Salida::class);
    }
}
