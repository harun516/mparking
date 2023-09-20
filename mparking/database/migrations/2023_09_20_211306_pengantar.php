<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengantar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengantar', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100); // Nama pengantar (gunakan 'nama' atau sesuaikan).
            $table->string('alamat', 255); // Alamat pengantar (gunakan 'alamat' atau sesuaikan).
            $table->string('no_telp', 20); // Nomor telepon pengantar (gunakan 'no_telp' atau sesuaikan).
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
        Schema::dropIfExists('pengantar');
    }
}
