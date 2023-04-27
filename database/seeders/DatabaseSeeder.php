<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ReactionType;
use Illuminate\Database\Seeder;
use App\Models\NotificationType;
use Database\Seeders\RolesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GendersSeeder::class,
            RolesSeeder::class,
            ReactionTypesSeeder::class,
            NotificationTypesSeeder::class
        ]);
    }
}
