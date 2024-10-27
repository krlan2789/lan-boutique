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
        Schema::create('privileges', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('slug', 128)->unique();
            $table->timestamps();
        });

        Schema::create('role_privilege', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained(
                table: "roles",
                indexName: "role_privilege_role_id",
            )->onDelete('cascade');
            $table->foreignId('privilege_id')->constrained(
                table: "privileges",
                indexName: "role_privilege_privilege_id",
            )->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('privileges');
        Schema::dropIfExists('role_privilege');
    }
};
