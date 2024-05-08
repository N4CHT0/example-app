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
        Schema::create('inventory_sertifikat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis_sertifikat');
            $table->string('nama_pemilik');
            $table->string('no_sertifikat');
            $table->string('status_sertifikat');
            $table->string('foto_sertifikat');
            $table->string('bukti_pengambilan');
            $table->string('bukti_pengiriman');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_sertifikat');
    }
};
