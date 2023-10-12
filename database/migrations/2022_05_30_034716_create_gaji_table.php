<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('npp');
            $table->string('status');
            $table->string('jabatan');
            $table->string('h_pendidikan');
            $table->string('h_mengajar');
            $table->string('jabatan_t');
            $table->string('h_tambahan');
            $table->string('tj_kelebihan');
            $table->string('tj_wali');
            $table->string('tj_koordinator');
            $table->string('tj_kehadiran');
            $table->string('tj_kerja');
            $table->string('tj_tetap');
            $table->string('tj_keluarga');
            $table->string('bpjs_ketenagakerjaan');
            $table->string('bpjs_kesehatan');
            $table->string('pajak_bpmu');
            $table->string('lain');
            $table->string('p_bpjs_ketenagakerjaan_sekolah');
            $table->string('p_bpjs_ketenagakerjaan_pegawai');
            $table->string('p_bpjs_kesehatan_sekolah');
            $table->string('p_bpjs_kesehatan_pegawai');
            $table->string('p_pajak_bpmu');
            $table->string('pph');
            $table->string('kasbon');
            $table->string('infak');
            $table->string('dplk');
            $table->string('ids_residence');
            $table->string('p_lain');
            $table->string('t_pendapatan');
            $table->string('t_potongan');
            $table->string('t_take');
            $table->string('tanggal');
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
        Schema::dropIfExists('gaji');
    }
};
