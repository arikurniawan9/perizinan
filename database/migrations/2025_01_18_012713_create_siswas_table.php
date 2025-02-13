<?php

use App\Models\Kelas;
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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Kelas::class) // Relasi ke tabel kelas
                  ->constrained() // Menambahkan constraint foreign key
                  ->onDelete('cascade'); // Jika kelas dihapus, siswa terkait juga dihapus
            $table->string('nis')->unique();
            $table->string('nama')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon',15)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
