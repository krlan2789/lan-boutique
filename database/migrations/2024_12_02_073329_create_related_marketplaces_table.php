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
        Schema::create('related_marketplaces', function (Blueprint $table) {
            $table->id();
            $table->text('url');
            $table->string('name', 255)->nullable();
            $table->foreignId('product_detail_id')->constrained(
                table: "product_details",
                indexName: "related_marketplace_product_detail_id",
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('related_marketplaces');
    }
};
