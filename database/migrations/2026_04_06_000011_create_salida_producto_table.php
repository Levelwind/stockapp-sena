<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salida_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salida_id')
                  ->constrained('salidas')
                  ->onDelete('cascade');
            $table->foreignId('producto_id')
                  ->constrained('productos')
                  ->onDelete('restrict');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 12, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('salida_producto');
    }
};
