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
        Schema::create('member', function (Blueprint $table) {
            $table->id('member_id');
            $table->foreignId('ktp_id');
            $table->string('email')->unique();
            $table->string('no_hp', 16);
            $table->string('no_wa', 16);
            $table->string('avatar', 128);
            $table->timestamps();

            $table->foreign('ktp_id')->references('ktp_id')->on('ktp')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
