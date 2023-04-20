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
        Schema::create('userlogin', function (Blueprint $table) {
            $table->id('user_login_id');
            $table->foreignId('member_id');
            $table->string('username', 32);
            $table->string('password', 255);
            $table->boolean('is_aktif');
            $table->string('access_token')->nullable();
            $table->string('access')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();

            $table->foreign('member_id')->references('member_id')->on('member')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlogin');
    }
};
