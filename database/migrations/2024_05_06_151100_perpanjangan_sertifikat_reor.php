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
        Schema::create('perpanjang_reor', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('no_sertifikat');
            $table->string('nik');
            $table->string('npwp');
            $table->string('nama_lengkap');
            $table->string('jenis_sertifikat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('no_telp');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('kelurahan_desa');
            $table->string('jenis_kelamin');
            $table->string('foto');
            $table->string('scan_foto_npwp');
            $table->string('scan_foto_ijazah');
            $table->string('scan_foto_sertifikat');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpanjang_reor');
    }
};
