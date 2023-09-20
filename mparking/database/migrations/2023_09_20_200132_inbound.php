<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Inbound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbound', function (Blueprint $table) {
            $table->id(); // Kolom ID biasanya cukup dinamai 'id' dan akan otomatis menjadi primary key.
            $table->integer('kendaraan_id'); // Kolom ID kendaraan.
            $table->integer('checkout_id'); // Kolom ID checkout.
            $table->string('kode_parkir', 20); // Kode parkir (dengan panjang maksimal).
            $table->string('driver_nama', 100); // Nama driver.
            $table->string('driver_ktp', 20); // Nomor KTP driver.
            $table->string('driver_vaksin', 20); // Nomor vaksin drive
            $table->integer('pengantaran_id'); // ID pengantaran.
            $table->string('no_referensi', 20); // Nomor referensi.
            $table->integer('sim'); // Poin SIM (Tidak perlu menyebut 'sim', cukup 'poin_sim' atau sesuaikan).
            $table->integer('stnk'); // Poin STNK (Tidak perlu menyebut 'stnk', cukup 'poin_stnk' atau sesuaikan).
            $table->integer('kir'); // Poin KIR (Tidak perlu menyebut 'kir', cukup 'poin_kir' atau sesuaikan).
            $table->integer('tidak_bersih'); // Status kebersihan (mungkin perlu deskripsi yang lebih jelas).
            $table->integer('bocor'); // Status bocor (mungkin perlu deskripsi yang lebih jelas).
            $table->integer('bau'); // Status bau (mungkin perlu deskripsi yang lebih jelas).
            $table->string('status', 30); // Status umum (gunakan sesuai kebutuhan).
            $table->string('note', 100); // Catatan (gunakan sesuai kebutuhan).
            $table->integer('gate')->nullable(); // Nomor gate (misalnya, 'gate_number' atau 'nomor_gate').
            $table->string('gr_code', 50)->nullable(); // Nomor faktur gudang.
            $table->timestamp('waktu_start_unloading')->nullable(); // Waktu mulai proses pembongkaran.
            $table->timestamp('waktu_finish_unloading')->nullable(); // Waktu selesai proses pembongkaran.
            $table->timestamp('waktu_finish_document')->nullable(); // Waktu selesai proses dokumen.
            $table->timestamp('waktu_keluar')->nullable(); // Waktu keluar dari lokasi.
            $table->string('register_by', 100); // ID pendaftaran oleh siapa (misalnya, 'registered_by').
            $table->string('checker_by', 100)->nullable(); // ID pemeriksaan oleh siapa (misalnya, 'checked_by').
            $table->string('document_by', 100)->nullable(); // ID pembuatan dokumen oleh siapa (misalnya, 'documented_by').
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
        Schema::dropIfExists('inbound');
    }
}
