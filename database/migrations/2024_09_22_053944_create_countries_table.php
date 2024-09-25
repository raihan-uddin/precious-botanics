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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->unique();
            $table->string('slug', 50)->unique();
            $table->string('iso_code_two', 2)->unique();
            $table->string('iso_code_three', 3)->unique();
            $table->string('currency_code', 20)->nullable();
            $table->string('currency_symbol', 5)->nullable();
            $table->string('calling_code', 10)->nullable();
            $table->boolean('customer_registration_allowed')->default(false);
            $table->boolean('is_active')->default(true);
            $table->string('logo_src', 2048)->nullable();
            $table->string('keywords', 2000)->nullable();
            $table->string('description', 2000)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
