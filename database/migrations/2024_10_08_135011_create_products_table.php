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
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });

        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained(
                table: "products",
                indexName: "product_categories_product_id",
            )->onDelete('cascade');
            $table->foreignId('category_id')->constrained(
                table: "categories",
                indexName: "product_categories_category_id",
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_categories');
    }
};
