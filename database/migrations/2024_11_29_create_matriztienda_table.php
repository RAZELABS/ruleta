<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matriz_tienda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tienda');
            $table->decimal('peso_tienda', 5, 2)->nullable();
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_tienda')->references('id')->on('tienda')->onDelete('cascade');
        });

        // Seed initial data
        $data = [
            ['id' => 1, 'id_tienda' => 1, 'peso_tienda' => 7.14],
            ['id' => 2, 'id_tienda' => 2, 'peso_tienda' => 7.14],
            ['id' => 3, 'id_tienda' => 3, 'peso_tienda' => 7.14],
            ['id' => 4, 'id_tienda' => 4, 'peso_tienda' => 7.14],
            ['id' => 5, 'id_tienda' => 5, 'peso_tienda' => 5.10],
            ['id' => 6, 'id_tienda' => 6, 'peso_tienda' => 5.10],
            ['id' => 7, 'id_tienda' => 7, 'peso_tienda' => 5.10],
            ['id' => 8, 'id_tienda' => 8, 'peso_tienda' => 5.10],
            ['id' => 9, 'id_tienda' => 9, 'peso_tienda' => 5.10],
            ['id' => 10, 'id_tienda' => 10, 'peso_tienda' => 5.10],
            ['id' => 11, 'id_tienda' => 11, 'peso_tienda' => 5.10],
            ['id' => 12, 'id_tienda' => 12, 'peso_tienda' => 5.10],
            ['id' => 13, 'id_tienda' => 13, 'peso_tienda' => 2.04],
            ['id' => 14, 'id_tienda' => 14, 'peso_tienda' => 2.04],
            ['id' => 15, 'id_tienda' => 15, 'peso_tienda' => 2.04],
            ['id' => 16, 'id_tienda' => 16, 'peso_tienda' => 2.04],
            ['id' => 17, 'id_tienda' => 17, 'peso_tienda' => 2.04],
            ['id' => 18, 'id_tienda' => 18, 'peso_tienda' => 2.04],
            ['id' => 19, 'id_tienda' => 19, 'peso_tienda' => 2.04],
            ['id' => 20, 'id_tienda' => 20, 'peso_tienda' => 1.02],
            ['id' => 21, 'id_tienda' => 21, 'peso_tienda' => 1.02],
            ['id' => 22, 'id_tienda' => 22, 'peso_tienda' => 1.02],
            ['id' => 23, 'id_tienda' => 23, 'peso_tienda' => 1.02],
            ['id' => 24, 'id_tienda' => 24, 'peso_tienda' => 1.02],
            ['id' => 25, 'id_tienda' => 25, 'peso_tienda' => 1.02],
            ['id' => 26, 'id_tienda' => 26, 'peso_tienda' => 1.02],
            ['id' => 27, 'id_tienda' => 27, 'peso_tienda' => 1.02],
            ['id' => 28, 'id_tienda' => 28, 'peso_tienda' => 1.02],
            ['id' => 29, 'id_tienda' => 29, 'peso_tienda' => 1.02],
            ['id' => 30, 'id_tienda' => 30, 'peso_tienda' => 1.02],
            ['id' => 31, 'id_tienda' => 31, 'peso_tienda' => 1.02],
            ['id' => 32, 'id_tienda' => 32, 'peso_tienda' => 1.02],
            ['id' => 33, 'id_tienda' => 33, 'peso_tienda' => 1.02],
            ['id' => 34, 'id_tienda' => 34, 'peso_tienda' => 1.02],
            ['id' => 35, 'id_tienda' => 35, 'peso_tienda' => 1.02],
        ];

        DB::table('matriz_tienda')->insert($data);
    }

    public function down(): void
    {
        Schema::dropIfExists('matriz_tienda');
    }
};
