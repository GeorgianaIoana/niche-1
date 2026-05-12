<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Indie & Alternative',
                'slug' => 'indie',
                'description' => 'Independent and alternative music from groundbreaking artists.',
            ],
            [
                'name' => 'Post-Punk',
                'slug' => 'post-punk',
                'description' => 'Modern post-punk and experimental rock sounds.',
            ],
            [
                'name' => 'Electronic',
                'slug' => 'electronic',
                'description' => 'Ambient, techno, and experimental electronic music.',
            ],
            [
                'name' => 'Rock',
                'slug' => 'rock',
                'description' => 'Classic rock, punk, and metal from the legends.',
            ],
            [
                'name' => 'Folk & Country',
                'slug' => 'folk',
                'description' => 'Americana, folk, and country from storytelling artists.',
            ],
            [
                'name' => 'Pop',
                'slug' => 'pop',
                'description' => 'Contemporary pop and art pop releases.',
            ],
            [
                'name' => 'CD',
                'slug' => 'cd',
                'description' => 'Compact disc releases and reissues.',
                'image' => '/images/Sade_50_R9294-7531.webp',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
