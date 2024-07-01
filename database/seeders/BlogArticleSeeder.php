<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = [
            [
                'title' => 'The Future of Crop Farming',
                'desc' => 'Exploring new technologies and techniques in crop farming.',
                'image' => 'path/to/image1.jpg',
                'content' => Str::random(500),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sustainable Livestock Practices',
                'desc' => 'How to maintain sustainability in livestock farming.',
                'image' => 'path/to/image2.jpg',
                'content' => Str::random(500),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Innovations in Precision Agriculture',
                'desc' => 'The latest advancements in precision agriculture.',
                'image' => 'path/to/image3.jpg',
                'content' => Str::random(500),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more articles as needed
        ];

        $articleCategories = [
            ['article_id' => 1, 'category_id' => 1], // The Future of Crop Farming -> Crop Farming
            ['article_id' => 2, 'category_id' => 7], // Sustainable Livestock Practices -> Livestock Farming
            ['article_id' => 3, 'category_id' => 13], // Innovations in Precision Agriculture -> Agricultural Techniques
            // Add more relationships as needed
        ];

        DB::table('blog_articles')->insert($articles);
        DB::table('blog_article_categories')->insert($articleCategories);
    }
}
