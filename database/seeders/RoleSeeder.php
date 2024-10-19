<?php

namespace Database\Seeders;

use App\Models\Privilege;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $privileges = Privilege::all();
        Role::factory(4)->hasAttached($privileges)->create();
    }
}
