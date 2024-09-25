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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('name', 50);       // Name of the variant
            $table->string('slug', 50);      // Slug of the variant
            // How much unit will be order in one quanity.
            $table->decimal('unit', 10, 2)->default(1)->comment('How much unit will be order in one quanity.');
            $table->decimal('mrp', 10, 2)->default(0)->comment('Maximum Retail Price');
            $table->decimal('online_sale_price', 10, 2)->default(0)->comment('Online Sale Price');
            $table->decimal('offline_sale_price', 10, 2)->default(0)->comment('Offline Sale Price');
            $table->string('uom')->nullable();
            $table->string('sku', 100)->nullable()->unique();
            $table->string('status')->default('draft');
            $table->string('sellable_type')->default('stock');
            $table->boolean('is_searchable')->default(true);
            $table->string('barcode', 190)->nullable()->unique();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
