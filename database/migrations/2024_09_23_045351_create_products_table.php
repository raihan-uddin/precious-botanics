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
            $table->string('name'); // SEO-friendly URL slug
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // Product description
            $table->string('sku')->unique(); // Stock Keeping Unit
            $table->decimal('price', 10, 2); // Product price
            $table->decimal('discount_price', 10, 2)->nullable(); // Discount price
            $table->integer('stock_quantity')->default(0); // Quantity in stock
            $table->boolean('in_stock')->default(true); // Stock status
            $table->boolean('is_active')->default(true); // Active status
            $table->boolean('is_featured')->default(false); // Featured product
            $table->string('meta_title')->nullable(); // Meta title for SEO
            $table->text('meta_description')->nullable(); // Meta description for SEO
            $table->string('image')->nullable(); // Primary product image
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
