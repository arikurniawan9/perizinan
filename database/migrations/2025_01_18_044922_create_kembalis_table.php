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
        Schema::create('kembalis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('izin_id')
                ->constrained('izins')
                ->onDelete('cascade'); // Relasi ke tabel izin
            $table->date('tgl_kembali'); // Tanggal kembali
            $table->integer('denda')->default(0); // Denda per hari
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kembalis');
    }
};
