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
        Category::factory(3)->create();
        Category::create([
            'name' => 'Vase',
            'slug' => 'vase',
            'description' => 'Vases',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
        Category::create([
            'name' => 'Plate',
            'slug' => 'plate',
            'description' => 'Plates',
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=800'
        ]);
    }
}
