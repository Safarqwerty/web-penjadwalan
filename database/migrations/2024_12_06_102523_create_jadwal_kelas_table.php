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
        Schema::create('jadwal_kelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('mata_pelajaran_id')->constrained('mata_pelajaran');  // Mengarah ke tabel mata_pelajaran
            $table->foreignId('pengajar_id')->constrained('users');
            $table->string('hari', 10);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_kelas');
    }
};

