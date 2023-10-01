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
            $table->foreignId('category_id')->constrained('categories')->unsigned()->nullable();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->longText('short_desc')->nullable();
            $table->longText('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimension')->nullable();
            $table->longText('faqs')->nullable();
            $table->string('status')->default('Available');
            $table->string('tag')->nullable();
            $table->string('meta_data')->nullable();
            $table->timestamps();
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
