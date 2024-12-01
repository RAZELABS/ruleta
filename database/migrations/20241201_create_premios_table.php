<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50)->nullable();
            $table->integer('estado')->nullable();
            $table->timestamps();
        });

        // Insert initial data
        $premios = [
            [
                'id' => 1,
                'descripcion' => '¡Ganaste!',
                'estado' => 1,
                'created_at' => '2024-11-27 01:17:57',
                'updated_at' => null
            ],
            [
                'id' => 2,
                'descripcion' => 'Sigue participando',
                'estado' => 1,
                'created_at' => '2024-11-27 01:19:00',
                'updated_at' => null
            ],
            [
                'id' => 3,
                'descripcion' => 'Inténtalo en tu siguiente compra ',
                'estado' => 1,
                'created_at' => '2024-11-27 15:46:52',
                'updated_at' => null
            ],
            [
                'id' => 4,
                'descripcion' => 'Estuviste muy cerca ',
                'estado' => 1,
                'created_at' => '2024-11-27 15:47:17',
                'updated_at' => null
            ],
            [
                'id' => 5,
                'descripcion' => 'Sigue participando ',
                'estado' => 1,
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'id' => 6,
                'descripcion' => 'Sigue participando ',
                'estado' => 1,
                'created_at' => null,
                'updated_at' => null
            ]
        ];

        DB::table('premios')->insert($premios);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premios');
    }
};
