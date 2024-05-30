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
        Schema::create('nilai_ujian_lokal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_user');
            $table->float('teknik_radio');
            $table->float('service_document');
            $table->float('radio_regulation');
            $table->float('bahasa_inggris');
            $table->float('perjanjian_internasional');
            $table->float('gmdss');
            $table->float('radio_telephony');
            $table->float('ibt');
            $table->float('morse');
            $table->float('pancasila');
            $table->float('teknik_listrik');
            $table->float('naveka');
            $table->float('praktek_service_document');
            $table->float('praktek_radio_telephony');
            $table->float('praktek_morse');
            $table->float('praktek_gmdss');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ujian_lokal');
    }
};
