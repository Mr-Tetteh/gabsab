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
        Schema::create('bundle_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('quantity');
            $table->string('devices');
            $table->string('adv_1')->nullable();
            $table->string('adv_2')->nullable();
            $table->string('adv_3')->nullable();
            $table->string('adv_4')->nullable();
            $table->string('adv_5')->nullable();
            $table->string('adv_6')->nullable();
            $table->string('adv_7')->nullable();
            $table->string('adv_8')->nullable();
            $table->string('adv_9')->nullable();
            $table->string('adv_10')->nullable();
            $table->string('adv_11')->nullable();
            $table->string('adv_12')->nullable();
            $table->string('adv_13')->nullable();
            $table->string('adv_14')->nullable();
            $table->string('adv_15')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bundle_plans');
    }
};
