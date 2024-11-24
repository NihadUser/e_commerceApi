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
        Schema::create('product_memories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('memory_id');
            $table->unsignedBigInteger('product_id');

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
        Schema::dropIfExists('product_memories');
    }
};
