<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mobil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobil', function (Blueprint $table) {
            $table->id(); // Biarkan nama kolom ID dengan 'id'.
            $table->string('mobil_id', 50); // Kolom ID mobil.
            $table->string('nama', 100); // Nama mobil (nama lebih singkat).
            $table->string('tonase', 20); // Tonase mobil.
            $table->string('kubikasi', 20); // Kubikasi mobil.
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
        Schema::dropIfExists('mobil');
    }
}
