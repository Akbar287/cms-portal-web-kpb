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
        Schema::create('aplikasi', function (Blueprint $table) {
            $table->id('aplikasi_id');
            $table->foreignId('organisasi_id');
            $table->string('nama_aplikasi', 64);
            $table->text('url');
            $table->text('deksripsi');

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aplikasi');
    }
};
