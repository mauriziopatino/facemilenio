<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::firstOrCreate([
            'name' => 'Male',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Gender::firstOrCreate([
            'name' => 'Female',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
