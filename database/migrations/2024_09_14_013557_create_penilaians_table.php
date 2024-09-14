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
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa')->onDelete('cascade');
            $table->date('tanggal');
            $table->enum('jenis_penilaian', ['UGD', 'GD']);
            $table->decimal('nilai', 5, 2);
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->timestamp('waktu_penilaian')->useCurrent();
            $table->integer('urutan')->default(1); // Urutan default
            $table->text('komen')->nullable(); // Komentar bisa null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
