<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'Admin',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Role::firstOrCreate([
            'name' => 'User',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
