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
            'name' => 'Monolith Console',
            'slug' => 'monolith-console',
            'category_id' => 1,
            'image' => null,
            'description' => 'Monolith Console',
            'specification' => json_encode([
                'color' => 'Black',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Cast Stone',
            ]),
            'is_featured' => true,
        ]);
        Product::create([
            'name' => 'Terra Dining Table',
            'slug' => 'terra-dining-table',
            'category_id' => 2,
            'image' => null,
            'description' => 'Terra Dining Table',
            'specification' => json_encode([
                'color' => 'Grey',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Natural Stone Top',
            ]),
            'is_featured' => true,
        ]);
        Product::create([
            'name' => 'Sculptural Pedestal',
            'slug' => 'sculptural-pedestal',
            'category_id' => 3,
            'image' => null,
            'description' => 'Sculptural Pedestal',
            'specification' => json_encode([
                'color' => 'Lime',
                'weight' => '10kg',
                'dimensions' => '10x10x10cm',
                'material' => 'Hand-Carved Limestone',
            ]),
            'is_featured' => true,
        ]);
        Product::factory(100)->recycle([
            Category::all()
        ])->create();
    }
}
