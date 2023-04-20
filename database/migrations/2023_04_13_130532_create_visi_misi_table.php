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
        Schema::create('visi_misi', function (Blueprint $table) {
            $table->id('visi_misi_id');
            $table->foreignId('tentang_kami_id');
            $table->enum('jenis', ['visi', 'misi']);
            $table->text('deskripsi');
            $table->enum('status', ['aktif', 'tidak_aktif']);
            $table->integer('urutan');

            $table->foreign('tentang_kami_id')->references('tentang_kami_id')->on('tentang_kami')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misi');
    }
};
