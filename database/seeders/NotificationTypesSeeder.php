<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NotificationType::firstOrCreate([
            'name' => 'Friend',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        NotificationType::firstOrCreate([
            'name' => 'Post',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        NotificationType::firstOrCreate([
            'name' => 'Comment',
            'created_by' => 1,
            'updated_by' => 1
        ]);

        NotificationType::firstOrCreate([
            'name' => 'Reaction',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
