<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transporter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporter', function (Blueprint $table) {
            $table->id();
            $table->string('transporter_id', 50); // Kolom ID transporter.
            $table->string('nama', 100); // Nama transporter (nama lebih singkat).
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
        Schema::dropIfExists('transporter');
    }
}
