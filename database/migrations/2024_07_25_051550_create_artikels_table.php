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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penulis');
            $table->string('nip_penulis');
            $table->string('unit_kerja_penulis');
            $table->string('judul');
            $table->text('nama_pendidikan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('instansi_pelaksana');
            // $table->string('kategori');
            $table->text('isi');
            $table->text('dokumen_artikel')->nullable();
            $table->text('gambar_artikel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
