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
        Schema::create('sosial_media', function (Blueprint $table) {
            $table->id('sosial_media_id');
            $table->foreignId('organisasi_id');
            $table->string('nama_sosmed', 128);
            $table->string('icon', 64);
            $table->text('url');
            $table->enum('status', ['aktif', 'tidak_aktif']);
            $table->integer('urutan');
            
            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sosial_media');
    }
};
