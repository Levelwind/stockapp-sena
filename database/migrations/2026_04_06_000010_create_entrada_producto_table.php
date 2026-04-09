<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entrada_producto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrada_id')
                  ->constrained('entradas')
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
        Schema::dropIfExists('entrada_producto');
    }
};
