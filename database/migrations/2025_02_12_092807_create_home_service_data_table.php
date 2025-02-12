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
        Schema::create('home_service_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('quantity');
            $table->string('advantage_1')->nullable();
            $table->string('advantage_2')->nullable();
            $table->string('advantage_3')->nullable();
            $table->string('advantage_4')->nullable();
            $table->string('advantage_5')->nullable();
            $table->string('advantage_6')->nullable();
            $table->string('advantage_7')->nullable();
            $table->string('advantage_8')->nullable();
            $table->string('advantage_9')->nullable();
            $table->string('advantage_10')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_service_data');
    }
};
