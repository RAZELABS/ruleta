<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('matriz_dia', function (Blueprint $table) {
            $table->id();
            $table->date('fecha')->nullable();
            $table->decimal('peso_dia', 5, 2)->nullable();
            $table->timestamps();
        });

        // Seed initial data
        $data = [
            ['id' => 2, 'fecha' => '2024-12-10', 'peso_dia' => 5.63,'ganadores_dia'=> 88],
            ['id' => 3, 'fecha' => '2024-12-11', 'peso_dia' => 5.64,'ganadores_dia'=> 88],
            ['id' => 4, 'fecha' => '2024-12-12', 'peso_dia' => 5.85,'ganadores_dia'=> 92],
            ['id' => 5, 'fecha' => '2024-12-13', 'peso_dia' => 6.68,'ganadores_dia'=> 105],
            ['id' => 6, 'fecha' => '2024-12-14', 'peso_dia' => 9.34,'ganadores_dia'=> 146],
            ['id' => 7, 'fecha' => '2024-12-15', 'peso_dia' => 8.64,'ganadores_dia'=> 135],
            ['id' => 8, 'fecha' => '2024-12-16', 'peso_dia' => 5.42,'ganadores_dia'=> 85],
            ['id' => 9, 'fecha' => '2024-12-17', 'peso_dia' => 5.63,'ganadores_dia'=> 88],
            ['id' => 10, 'fecha' => '2024-12-18', 'peso_dia' => 5.64,'ganadores_dia'=> 88],
            ['id' => 11, 'fecha' => '2024-12-19', 'peso_dia' => 5.85,'ganadores_dia'=> 92],
            ['id' => 12, 'fecha' => '2024-12-20', 'peso_dia' => 6.68,'ganadores_dia'=> 105],
            ['id' => 13, 'fecha' => '2024-12-21', 'peso_dia' => 9.34,'ganadores_dia'=> 146],
            ['id' => 14, 'fecha' => '2024-12-22', 'peso_dia' => 8.64,'ganadores_dia'=> 135],
            ['id' => 15, 'fecha' => '2024-12-23', 'peso_dia' => 5.42,'ganadores_dia'=> 85],
            ['id' => 16, 'fecha' => '2024-12-24', 'peso_dia' => 5.63,'ganadores_dia'=> 88],
        ];

        DB::table('matriz_dia')->insert($data);
    }

    public function down(): void
    {
        Schema::dropIfExists('matriz_dia');
    }
};
