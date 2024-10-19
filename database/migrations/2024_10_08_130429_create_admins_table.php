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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('username', 64)->unique();
            $table->string('password', 64);
            $table->foreignId('employee_id')->constrained(
                table: 'employees',
                indexName: 'admins_employee_id'
            );
            $table->foreignId('role_id')->constrained(
                table: "roles",
                indexName: "admins_role_id",
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
