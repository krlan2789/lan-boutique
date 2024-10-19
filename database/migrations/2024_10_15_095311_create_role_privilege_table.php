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
        Schema::create('role_privilege', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained(
                table: "roles",
                indexName: "role_privilege_role_id",
            );
            $table->foreignId('privilege_id')->constrained(
                table: "privileges",
                indexName: "role_privilege_privilege_id",
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_privilege');
    }
};
