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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('code', 255)->unique();
            $table->text('description')->nullable();
            $table->float('discount');
            $table->unsignedBigInteger('nominal');
            $table->unsignedBigInteger('nominal_max');
            $table->unsignedBigInteger('min_purchase');
            $table->morphs('promoable');
            $table->timestamp('applies_to');
            $table->timestamp('expired_at');
            $table->timestamps();
        });

        // Schema::create('promo_products', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_id')->constrained(
        //         table: "products",
        //         indexName: "promo_products_product_id",
        //     )->onDelete('cascade');
        //     $table->foreignId('promo_id')->constrained(
        //         table: "promos",
        //         indexName: "promo_products_promo_id",
        //     )->onDelete('cascade');
        //     $table->timestamps();
        // });

        // Schema::create('promo_product_variants', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('product_variant_id')->constrained(
        //         table: "product_variants",
        //         indexName: "promo_product_variants_product_variant_id",
        //     )->onDelete('cascade');
        //     $table->foreignId('promo_id')->constrained(
        //         table: "promos",
        //         indexName: "promo_product_variants_promo_id",
        //     )->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
        // Schema::dropIfExists('promo_products');
        // Schema::dropIfExists('promo_product_variants');
    }
};
