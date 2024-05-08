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
        Schema::create('perpanjang_gmdss', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('seafare_code');
            $table->string('nik');
            $table->string('lembaga_diklat');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('kecamatan');
            $table->string('kelurahan_desa');
            $table->string('kode_pos');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('status');
            $table->string('nama_ibu_kandung');
            $table->string('nama_ayah_kandung');
            $table->string('foto');
            $table->string('scan_foto_ijazah_laut');
            $table->string('scan_foto_masa_layar');
            $table->string('scan_foto_mcu');
            $table->string('scan_foto_sertifikat_bst');
            $table->string('scan_foto_ktp');
            $table->string('scan_foto_akte');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpanjang_gmdss');
    }
};
