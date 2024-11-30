<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('id_tienda');
            $table->char('dni', 8);
            $table->char('resultado', 1);
            $table->time('hora')->nullable();
            $table->char('opcion', 1)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_tienda')->references('id')->on('tienda')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle');
    }
};
