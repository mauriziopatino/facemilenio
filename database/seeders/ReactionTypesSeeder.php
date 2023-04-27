<?php

namespace Database\Seeders;

use App\Models\ReactionType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReactionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReactionType::firstOrCreate([
            'name' => 'Like',
            'icon' => '',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        ReactionType::firstOrCreate([
            'name' => 'Angry',
            'icon' => '',
            'created_by' => 1,
            'updated_by' => 1
        ]);
        
        ReactionType::firstOrCreate([
            'name' => 'Heart',
            'icon' => '',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
