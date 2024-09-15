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
        Schema::create('riwayat_penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_penilaian')->constrained('penilaian')->onDelete('cascade');
            $table->foreignId('id_user_ubah')->constrained('users')->onDelete('cascade'); // User yang mengubah nilai
            $table->timestamp('waktu_ubah')->useCurrent();
            $table->integer('nilai_lama');
            $table->integer('nilai_baru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_penilaian');
    }
};
