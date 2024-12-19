<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Test Admin',
            'username' => 'admin',
            "level" => "admin"
        ]);
        User::factory()->create([
            'name' => 'Test Librarian',
            'username' => 'librarian',
            "level" => "librarian"
        ]);

        $this->call([
            BooksSeeder::class,
            JournalsSeeder::class,
            CDSeeder::class,
            NewspaperSeeder::class,
            FinalYearProjectSeeder::class,
        ]);
    }
}
