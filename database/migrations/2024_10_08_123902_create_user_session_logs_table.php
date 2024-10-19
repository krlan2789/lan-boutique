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
        Schema::create('user_session_logs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ip_address', 64)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload')->nullable();
            $table->foreignId('user_id')->constrained(
                table: "users",
                indexName: "user_session_logs_user_id",
            );
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_session_logs');
    }
};
