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
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->bigInteger('price');
            $table->string('brand')->nullable();
            $table->bigInteger('discount_price')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_deal_of_the_day')->default(false);
            $table->boolean('is_new_arrival')->default(false);
            $table->string('category');
            $table->integer('quantity');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
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
