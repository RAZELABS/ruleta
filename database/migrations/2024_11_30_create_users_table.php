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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('dni', 8)->default('');
            $table->unsignedBigInteger('id_tienda')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert initial data
        DB::table('users')->insert([
            [
                'id' => 4,
                'dni' => '08016696',
                'id_tienda' => 1,
                'name' => 'Ramon Cadenas',
                'email' => 'ramon.cadenas@raze.pe',
                'password' => '$2y$12$2QxPjkadY14.R7RQ/tGJuOmBp0uPmWaZ3oJHUNTDRK6Q/ge5sfVw6',
                'created_at' => '2024-10-13 06:32:37',
                'updated_at' => '2024-11-19 22:51:48'
            ],
            [
                'id' => 5,
                'dni' => '08016696',
                'id_tienda' => 1,
                'name' => 'Rosa Aquino',
                'email' => 'raquinoolivos@gmail.com',
                'password' => '$2y$12$2QxPjkadY14.R7RQ/tGJuOmBp0uPmWaZ3oJHUNTDRK6Q/ge5sfVw6',
                'created_at' => '2024-10-13 06:32:37',
                'updated_at' => '2024-11-19 22:51:48'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
