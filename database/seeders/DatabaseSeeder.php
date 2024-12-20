<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book; // Import model Book
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder untuk User 
        User::factory()->create([
            'name' => 'Norman Thoir',
            'email' => 'norman@gmail.com',
        ]);

        // Seeder untuk Category
        $categories = [
            'Programming',
            'Robotics',
            'Science',
            'History'
        ];

        foreach ($categories as $category) {
            Category::create(['nama' => $category]);
        }

        // Seeder untuk Book menggunakan factory
        Book::factory(8)->create();
    }
}
