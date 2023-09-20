<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kendaraan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id(); // Kolom ID biasanya cukup dinamai 'id' dan akan otomatis menjadi primary key.
            $table->integer('kendaraan_id'); // Menggunakan 'kendaraan_id' untuk ID kendaraan.
            $table->string('transporter_id', 50); // Menggunakan 'transporter_id' untuk ID transporter.
            $table->string('mobil_id', 50); // Menggunakan 'mobil_id' untuk ID mobil.
            $table->string('no_pol', 20); // Menggunakan 'no_pol' untuk nomor polisi.
            $table->year('tahun_produksi'); // Kolom 'tahun_produksi' dengan tipe tahun.
            $table->string('nomor_stnk', 30); // Menggunakan 'nomor_stnk' untuk nomor STNK.
            $table->string('nomor_kir', 30); // Menggunakan 'nomor_kir' untuk nomor KIR.
            $table->string('barcode', 100)->nullable(); // Menggunakan 'barcode' untuk kode barcode (opsional).
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
        Schema::dropIfExists('kendaraan');
    }
}
