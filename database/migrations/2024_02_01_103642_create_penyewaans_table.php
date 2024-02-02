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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("kendaraan_id");
            $table->foreignId("driver_id");
            // $table->string("user_id");
            $table->foreignId("pihak_menyetujui_level_1");
            $table->foreignId("pihak_menyetujui_level_2");
            $table->date("tanggal_sewa");
            $table->string("status");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
