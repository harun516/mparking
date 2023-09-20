<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Role extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id(); // Biarkan nama kolom ID dengan 'id'.
            $table->string('role_id', 20); // ID peran (gunakan 'role_id' atau sesuaikan).
            $table->string('nama', 50); // Nama peran (gunakan 'nama' atau sesuaikan).
            $table->timestamps(); // Kolom 'created_at' dan 'updated_at' untuk timestamp.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
