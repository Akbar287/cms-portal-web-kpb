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
        Schema::create('tentang_kami', function (Blueprint $table) {
            $table->id('tentang_kami_id');
            $table->foreignId('organisasi_id');
            $table->string('judul', 128);
            $table->string('gambar', 128);
            $table->text('deskripsi');

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentang_kami');
    }
};
