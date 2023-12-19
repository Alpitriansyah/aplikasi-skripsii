<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Ruangan;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Dosen::class)->nullable()->constrained('dosens');
            $table->foreignIdFor(Mahasiswa::class)->nullable()->constrained('mahasiswas');
            $table->foreignIdFor(Ruangan::class)->nullable()->constrained('ruangans');
            $table->foreignIdFor(User::class)->nullable()->constrained('users');
            $table->string('nama_peminjam');
            $table->string('jurusan');
            $table->string('ruangan');
            $table->string('keperluan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->text('deskripsi');
            $table->enum('status',['Diproses', 'Dipinjam', 'Ditolak']);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
