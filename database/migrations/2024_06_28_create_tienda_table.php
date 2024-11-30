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
        Schema::create('tienda', function (Blueprint $table) {
            $table->id();
            $table->char('codigo', 3)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->timestamps();
        });

        // Seed initial data
        $data = [
            ['id' => 1, 'codigo' => '102', 'nombre' => 'JOCKEY PLAZA'],
            ['id' => 2, 'codigo' => '204', 'nombre' => 'MEGAPLAZA'],
            ['id' => 3, 'codigo' => '212', 'nombre' => 'MALL DEL SUR'],
            ['id' => 4, 'codigo' => '202', 'nombre' => 'SAN MIGUEL'],
            ['id' => 5, 'codigo' => '207', 'nombre' => 'ANGAMOS'],
            ['id' => 6, 'codigo' => '208', 'nombre' => 'SANTA ANITA'],
            ['id' => 7, 'codigo' => '304', 'nombre' => 'AREQUIPA'],
            ['id' => 8, 'codigo' => '312', 'nombre' => 'TRUJILLO MALL'],
            ['id' => 9, 'codigo' => '106', 'nombre' => 'MIRAFLORES'],
            ['id' => 10, 'codigo' => '205', 'nombre' => 'BELLAVISTA'],
            ['id' => 11, 'codigo' => '307', 'nombre' => 'CHICLAYO MALL'],
            ['id' => 12, 'codigo' => '213', 'nombre' => 'PURUCHUCO'],
            ['id' => 13, 'codigo' => '210', 'nombre' => 'SALAVERRY'],
            ['id' => 14, 'codigo' => '201', 'nombre' => 'LIMA CENTRO'],
            ['id' => 15, 'codigo' => '211', 'nombre' => 'CENTRO CIVICO'],
            ['id' => 16, 'codigo' => '321', 'nombre' => 'AQP PORONGOCHE'],
            ['id' => 17, 'codigo' => '309', 'nombre' => 'CHIMBOTE'],
            ['id' => 18, 'codigo' => '101', 'nombre' => 'SAN ISIDRO'],
            ['id' => 19, 'codigo' => '209', 'nombre' => 'LIMA NORTE'],
            ['id' => 20, 'codigo' => '303', 'nombre' => 'PIURA'],
            ['id' => 21, 'codigo' => '320', 'nombre' => 'PIURA MALL'],
            ['id' => 22, 'codigo' => '214', 'nombre' => 'COMAS'],
            ['id' => 23, 'codigo' => '324', 'nombre' => 'SF HUANCAYO'],
            ['id' => 24, 'codigo' => '323', 'nombre' => 'ICA MALL'],
            ['id' => 25, 'codigo' => '322', 'nombre' => 'CAJAMC QUINDE'],
            ['id' => 26, 'codigo' => '206', 'nombre' => 'ATOCONGO'],
            ['id' => 27, 'codigo' => '406', 'nombre' => 'IQUITOS MALL'],
            ['id' => 28, 'codigo' => '419', 'nombre' => 'SF PUCALLPA'],
            ['id' => 29, 'codigo' => '420', 'nombre' => 'SF HUANUCO'],
            ['id' => 30, 'codigo' => '325', 'nombre' => 'CUSCO'],
            ['id' => 31, 'codigo' => '421', 'nombre' => 'EXPRESS CAÑETE'],
            ['id' => 32, 'codigo' => '456', 'nombre' => 'EXPRESS TACNA'],
            ['id' => 33, 'codigo' => '455', 'nombre' => 'EXPRESS HUARAZ'],
            ['id' => 34, 'codigo' => '459', 'nombre' => 'EXPRESS AYACUCHO'],
            ['id' => 35, 'codigo' => '849', 'nombre' => 'LA MOLINA'],
        ];

        // Insert the data
        DB::table('tienda')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tienda');
    }
};
