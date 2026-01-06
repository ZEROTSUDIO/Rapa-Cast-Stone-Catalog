<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Category::create([
            'name' => 'Fountain',
            'slug' => 'fountain',
            'description' => 'Fountains',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
        Category::create([
            'name' => 'Pottery',
            'slug' => 'pottery',
            'description' => 'Potteries',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
        Category::create([
            'name' => 'Water Fall',
            'slug' => 'water-fall',
            'description' => 'Water Falls',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
        Category::create([
            'name' => 'Fire Place',
            'slug' => 'fire-place',
            'description' => 'Fire Places',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
        Category::create([
            'name' => 'Lantern',
            'slug' => 'lantern',
            'description' => 'Lanterns',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);

        Category::factory(3)->create();
    }
}
