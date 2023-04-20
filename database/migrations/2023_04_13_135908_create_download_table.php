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
        Schema::create('download', function (Blueprint $table) {
            $table->id('download_id');
            $table->foreignId('organisasi_id');
            $table->foreignId('kategori_id');
            $table->string('judul', 128);
            $table->string('konten', 128);
            $table->string('nama_file', 128);
            $table->enum('status', ['aktif', 'tidak_aktif']);

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download');
    }
};
