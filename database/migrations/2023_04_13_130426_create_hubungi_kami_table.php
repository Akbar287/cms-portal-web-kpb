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
        Schema::create('hubungi_kami', function (Blueprint $table) {
            $table->id('hubungi_kami_id');
            $table->foreignId('organisasi_id');
            $table->string('nama', 128);
            $table->string('telepon', 16);
            $table->string('email', 128);
            $table->text('deskripsi');
            $table->enum('status', ['baru', 'progress', 'selesai']);
            $table->timestamps();

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungi_kami');
    }
};
