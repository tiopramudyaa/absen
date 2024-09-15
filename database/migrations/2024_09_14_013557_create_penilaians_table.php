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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_mahasiswa')->constrained('mahasiswa')->onDelete('cascade');
            $table->date('tanggal');
            $table->text('jenis_penilaian')->nullable();
            $table->integer('nilai');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->timestamp('waktu_penilaian')->useCurrent();
            $table->text('komen')->nullable();
            $table->foreignId('id_minggu')->constrained('minggu_penilaian')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
