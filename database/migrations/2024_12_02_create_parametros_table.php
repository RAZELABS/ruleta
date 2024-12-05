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
        Schema::create('parametros', function (Blueprint $table) {
            $table->id();
            $table->string('flag', 20)->nullable();
            $table->integer('valor')->nullable();
            $table->string('descripcion', 50)->nullable();
            $table->timestamps();
        });

        // Seed initial data
        $data = [
            [
                'id' => 1,
                'flag' => 'estado',
                'valor' => 1,
                'descripcion' => 'Activo',
                'created_at' => '2024-11-27 01:17:57'
            ],
            [
                'id' => 2,
                'flag' => 'estado',
                'valor' => 2,
                'descripcion' => 'Inactivo',
                'created_at' => '2024-11-27 01:19:00'
            ],
            [
                'id' => 3,
                'flag' => 'resultado',
                'valor' => 1,
                'descripcion' => 'Gano',
                'created_at' => '2024-11-27 15:46:52'
            ],
            [
                'id' => 4,
                'flag' => 'resultado',
                'valor' => 2,
                'descripcion' => 'Perdio',
                'created_at' => '2024-11-27 15:47:17'
            ],
            [
                'id' => 5,
                'flag' => 'tipo_documento',
                'valor' => 1,
                'descripcion' => 'DNI',
                'created_at' => '2024-11-27 15:47:17'
            ],
            [
                'id' => 6,
                'flag' => 'tipo_documento',
                'valor' => 2,
                'descripcion' => 'C.E',
                'created_at' => '2024-11-27 15:47:17'
            ],

            [
                'id' => 7,
                'flag' => 'tipo_documento',
                'valor' => 3,
                'descripcion' => 'Pasaporte',
                'created_at' => '2024-11-27 15:47:17'
            ],
        ];

        // Insert the data
        DB::table('parametros')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametros');
    }
};
