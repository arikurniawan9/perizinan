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
        Schema::create('izins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade'); // Relasi ke tabel siswa
            $table->date('tgl_pulang'); // Tanggal pulang
            $table->date('tgl_kembali')->nullable(); // Tanggal kembali (opsional)
            $table->enum('status', ['pulang', 'kembali']); // Status izin
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izins');
    }
};
