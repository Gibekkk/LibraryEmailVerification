<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 10; $i++) {
            $isEbook = $faker->boolean();
            DB::table('books')->insert([
                'judul' => $faker->sentence,
                'penerbit' => $faker->company,
                'penulis' => $faker->name,
                'tahun_terbit' => $faker->year,
                'ISBN' => $faker->isbn13,
                'isEbook' => $isEbook,
                'ebookLink' => $isEbook ? $faker->url() : null,
                'isBorrowed' => !$isEbook ? $faker->boolean() : false,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
