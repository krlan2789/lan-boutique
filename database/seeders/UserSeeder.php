<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(32)->recycle([
            Employee::all(),
            Role::all(),
        ])->create();
    }
}
