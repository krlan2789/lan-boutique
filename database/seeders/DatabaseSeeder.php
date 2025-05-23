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
        $this->call([PrivilegeSeeder::class, CategorySeeder::class]);
        $this->call([EmployeeSeeder::class, RoleSeeder::class, ProductSeeder::class]);
        $this->call([AdminSeeder::class, UserSeeder::class, ProductVariantSeeder::class]);
        $this->call([ProductDetailSeeder::class, PromoSeeder::class]);
        $this->call([RelatedMarketplaceSeeder::class]);
    }
}
