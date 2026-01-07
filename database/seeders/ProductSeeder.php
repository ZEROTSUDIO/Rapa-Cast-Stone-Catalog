<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            CategorySeeder::class,
        ]);

        $fountain = Category::where('slug', 'fountain')->firstOrFail();
        $pottery  = Category::where('slug', 'pottery')->firstOrFail();

        Product::create([
            'name' => 'Relief Lotus',
            'slug' => 'relief-lotus',
            'category_id' => $fountain->id,
            'image' => null,
            'description' => 'Relief Lotus',
            'specification' => [
                'color' => 'Black',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Stone',
            ],
            'is_featured' => true,
        ]);
        Product::create([
            'name' => 'Cream Gentong',
            'slug' => 'cream-gentong',
            'category_id' => $pottery->id,
            'image' => 'img/100_2588.jpg',
            'description' => 'Gentong dari cream',
            'specification' => [
                'color' => 'Cream',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Cast Stone',
            ],
            'is_featured' => true,
        ]);

        Product::factory(100)->recycle([
            Category::all()
        ])->create();
    }
}
