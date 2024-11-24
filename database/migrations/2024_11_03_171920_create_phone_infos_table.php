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
        Schema::create('phone_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->double('screen_size');
            $table->string('name');
            $table->integer('core_nums');
            $table->integer('screen_height');
            $table->integer('screen_width');
            $table->integer('display');
            $table->string('main_camera', 10);
            $table->string('front_camera', 10);
            $table->integer('battery');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('memory_id');
            $table->integer('discount_percent')->nullable();

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('memory_id')->references('id')->on('memories');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phone_infos');
    }
};
