<?php

namespace Database\Seeders;

use App\Models\{User,Category,Receipe};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // create 5 category with each category has 20 receipes
        Category::factory(5)
        ->has(Receipe::factory()->count(20),'receipes')
        ->create();
    }
}
