<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->hasPosts(10)
            ->create([
                'email' => 'test@example.com',
                'password' => 'secret'
            ]);

        User::factory()
            ->count(5)
            ->hasPosts(10)
            ->create();
    }
}
