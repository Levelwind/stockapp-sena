<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'documento', 'tipo_documento', 'telefono', 'ciudad', 'email'];
    protected $table = 'clientes';

    public function salidas() {
        return $this->hasMany(Salida::class);
    }
}
