<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
        DB::table('categories_has_news')->insert($this->getCategoryNews());
    }

    public function getData(): array
    {
        $data = [];
        $faker = Factory::create();
        for($i = 0; $i < 100; $i++){
            $title = $faker->sentence(5);
            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'author' => $faker->userName(),
                'description' => $faker->text(100)
            ];
        }
        return $data;
    }

    public function getCategoryNews(): array
    {
        $data = [];
        $newsId = 1;
        for($i = 1; $i <= 10; $i++){
            for($j = 1; $j <= 10; $j++) {
                $data[] = [
                    'category_id' => $i,
                    'news_id' => $newsId,
                ];
                $newsId++;
            }
            
        }
        return $data;
    }
}
