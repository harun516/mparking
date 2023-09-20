<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Outbound extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outbound', function (Blueprint $table) {
            $table->id(); // Kolom ID biasanya cukup dinamai 'id' dan akan otomatis menjadi primary key.
            $table->integer('kendaraan_id'); // Kolom ID kendaraan.
            $table->integer('checkout_id'); // Kolom ID checkout.
            $table->string('kode_parkir', 20); // Kode parkir (dengan panjang maksimal).
            $table->string('driver_nama', 100); // Nama driver.
            $table->string('driver_ktp', 20); // Nomor KTP driver.
            $table->string('driver_vaksin', 20); // Nomor vaksin drive
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
            $table->integer('bundle_id')->nullable(); //ID bundle (opsional).
            $table->integer('no_do')->nullable(); //Nomor DO (opsional).
            $table->timestamp('waktu_start_document')->nullable(); //Waktu mulai dokumen (opsional).
            $table->timestamp('waktu_start_picking')->nullable(); //Waktu mulai picking (opsional).
            $table->timestamp('waktu_start_loading')->nullable(); //Waktu mulai loading (opsional).
            $table->timestamp('waktu_finish_loading')->nullable(); //Waktu selesai loading (opsional).
            $table->timestamp('waktu_keluar')->nullable(); // Waktu keluar (opsional).
            $table->string('picking_by')->nullable(); // Dipicking oleh siapa (opsional).
            $table->string('register_by', 100); // ID pendaftaran oleh siapa (misalnya, 'registered_by').
            $table->string('loading_by', 100)->nullable(); // ID pemeriksaan oleh siapa (misalnya, 'checked_by').
            $table->string('document_by', 100)->nullable(); // ID pembuatan dokumen oleh siapa (misalnya, 'documented_by').
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outbound');
    }
}
