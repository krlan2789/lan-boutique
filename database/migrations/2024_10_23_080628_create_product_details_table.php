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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->text('summary');
            $table->text('description')->nullable();
            $table->jsonb('tags')->nullable();
            $table->jsonb('images')->nullable();
            $table->jsonb('highlights')->nullable();
            $table->jsonb('colors')->nullable();
            $table->jsonb('size')->nullable();
            $table->morphs('detailable');
            // $table->foreignId('product_id')->nullable()->constrained(
            //     table: 'products',
            //     indexName: 'product_details_product_id',
            // );
            // $table->foreignId('product_variant_id')->nullable()->constrained(
            //     table: 'product_variants',
            //     indexName: 'product_details_product_variant_id',
            // );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
