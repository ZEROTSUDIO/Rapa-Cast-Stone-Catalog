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

        $this->call([
            CategorySeeder::class,
        ]);

        $fountain = Category::where('slug', 'fountain')->firstOrFail();
        $pot  = Category::where('slug', 'pot')->firstOrFail();

        Product::create([
            'code' => 'RL-001',
            'name' => 'Relief Lotus',
            'slug' => 'relief-lotus',
            'category_id' => $fountain->id,
            'description' => 'Relief Lotus',
            'specification' => [
                'color' => 'Black',
                'height' => '150cm',
                'frame width' => '50cm',
                'material' => 'Stone',
            ],
            'is_featured' => true,
        ]);
        Product::create([
            'code' => 'GC-001',
            'name' => 'Gentong Cream',
            'slug' => 'gentong-cream',
            'category_id' => $pot->id,
            'description' => 'Gentong cetakan cream',
            'specification' => [
                'color' => 'White Cream',
                'dimensions' => 'D.50 x T.30cm',
                'stand' => '30 x 30 x 12cm',
                'material' => 'Cast Stone',
            ],
            'is_featured' => true,
        ]);

        Product::create([
            'code' => 'PKL-001',
            'name' => 'Pot Kubus Large',
            'slug' => 'pot-kubus-large',
            'category_id' => $pot->id,
            'description' => 'Pot kubus tanaman hias besar',
            'specification' => [
                'color' => 'black',
                'dimensions' => '50 x 50 x 50cm',
                'stand' => '50 x 50 x 12cm',
                'material' => 'Cast Stone',
            ],
            'is_featured' => true,
        ]);

        // Product::factory(100)->recycle([
        //     Category::all()
        // ])->create();
    }
}
