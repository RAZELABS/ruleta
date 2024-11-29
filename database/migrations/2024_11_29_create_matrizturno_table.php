<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matriz_turno', function (Blueprint $table) {
            $table->id();
            $table->string('turno', 10)->nullable();
            $table->time('inicio')->nullable();
            $table->time('fin')->nullable();
            $table->decimal('peso_turno', 5, 2)->nullable();
            $table->timestamps();
        });

        $data = [
            [
                'id' => 1,
                'turno' => 'Mañana',
                'inicio' => '08:00:00',
                'fin' => '13:00:00',
                'peso_turno' => 21.00
            ],
            [
                'id' => 2,
                'turno' => 'Tarde',
                'inicio' => '13:00:01',
                'fin' => '17:00:00',
                'peso_turno' => 38.00
            ],
            [
                'id' => 3,
                'turno' => 'Noche',
                'inicio' => '17:00:01',
                'fin' => '24:00:00',
                'peso_turno' => 41.00
            ]
        ];

        DB::table('matriz_turno')->insert($data);
    }

    public function down(): void
    {
        Schema::dropIfExists('matriz_turno');
    }
};
