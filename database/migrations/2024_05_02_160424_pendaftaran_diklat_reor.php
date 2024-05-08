<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_reor', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('pilihan_diklat');
            $table->string('periode_ujian_negara');
            $table->string('nik');
            $table->string('npwp');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('nama_instansi_kerja');
            $table->string('status');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('scan_foto_ktp');
            $table->string('scan_foto_ijazah_terakhir');
            $table->string('scan_foto_akte');
            $table->string('scan_foto_npwp');
            $table->string('foto');
            $table->string('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_reor');
    }
};
