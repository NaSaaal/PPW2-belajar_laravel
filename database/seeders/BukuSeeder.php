<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            \DB::table('books')->insert([
                'judul' => fake()->sentence(3),
                'penulis' => fake()->name,
                'harga' => fake()->numberBetween(10000, 50000),
                'tgl_terbit' => now(),
            ]);
        }
    }
}
