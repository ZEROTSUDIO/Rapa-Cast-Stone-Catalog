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
        Product::create([
            'name' => 'Relief Lotus',
            'slug' => 'relief-lotus',
            'category_id' => 4,
            'image' => null,
            'description' => 'Relief Lotus',
            'specification' => json_encode([
                'color' => 'Black',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Stone',
            ]),
            'is_featured' => true,
        ]);
        Product::create([
            'name' => 'Cream Gentong',
            'slug' => 'cream-gentong',
            'category_id' => 5,
            'image' => null,
            'description' => 'Gentong dari cream',
            'specification' => json_encode([
                'color' => 'Cream',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Cast Stone',
            ]),
            'is_featured' => true,
        ]);

        Product::factory(100)->recycle([
            Category::all()
        ])->create();
    }
}
