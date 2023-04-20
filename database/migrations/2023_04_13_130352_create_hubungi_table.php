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
        Schema::create('hubungi', function (Blueprint $table) {
            $table->id('hubungi_id');
            $table->foreignId('organisasi_id');            
            $table->string('alamat', 128);
            $table->string('telepon', 16);
            $table->string('no_hp', 16);
            $table->string('no_wa', 16);
            $table->string('email', 128);

            $table->foreign('organisasi_id')->references('organisasi_id')->on('organisasi')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hubungi');
    }
};
