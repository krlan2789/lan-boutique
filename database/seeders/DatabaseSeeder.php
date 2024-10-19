<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([PrivilegeSeeder::class]);
        $this->call([EmployeeSeeder::class, RoleSeeder::class]);
        $this->call([AdminSeeder::class, UserSeeder::class]);
        // Admin::factory(10)->recycle([Employee::all()])->create();
    }
}
