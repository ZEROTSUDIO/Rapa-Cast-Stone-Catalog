<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $this->call([
            TopicSeeder::class,
            AdminUserSeeder::class,
        ]);
        Article::factory(100)->recycle([
            Topic::all(),
            User::all()
        ])->create();
    }
}
