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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique();
            $table->string('name');
            $table->char('price');
            $table->char('discount');
            $table->string('features')->nullable();
            $table->string('desc')->nullable();
            $table->char('category')->nullable();
            $table->string('usage')->nullable();
            $table->string('warnings')->nullable();
            $table->char('stock');
            $table->char('rating');
            $table->char('reviews')->nullable();
            $table->char('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
