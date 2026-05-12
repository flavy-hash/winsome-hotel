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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->nullable()->constrained()->nullOnDelete();
            $table->string('guest_name');
            $table->string('email');
            $table->tinyInteger('rating')->unsigned();          // 1–5 overall
            $table->tinyInteger('service_rating')->unsigned()->nullable(); // 1–5 service
            $table->tinyInteger('cleanliness_rating')->unsigned()->nullable();
            $table->string('title', 160)->nullable();
            $table->text('body');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
