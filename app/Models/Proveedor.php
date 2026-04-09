<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'nit', 'telefono', 'ciudad', 'email'];
    protected $table = 'proveedores';

    public function entradas() {
        return $this->hasMany(Entrada::class);
    }
}
