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
        Schema::create('admin_session_logs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('ip_address', 64)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload')->nullable();
            $table->foreignId('admin_id')->constrained(
                table: "admins",
                indexName: "admin_session_logs_admin_id",
            );
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_session_logs');
    }
};
