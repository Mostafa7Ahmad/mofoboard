<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $articles_count = 5;

        $categories_titles = [
            'مشاريعنا',
            'أعمالنا',
            'الأخبار',
            // 'تدوينات',
            // 'آراء',
            // 'تحليلات',
            // 'تصميم',
            // 'برمجة',
            // 'تطبيقات',
            // 'ألعاب',
        ];

        $faker = Factory::create('ar_SA');
        foreach ($categories_titles as $category_title) {
            $this->command->info('creating category ' . $category_title);
            $category = \App\Models\Category::firstOrCreate([
                'user_id' => \App\Models\User::firstOrFail()->id,
                'slug' => 'test' . uniqid(),
                'title' => $category_title,
                'description' => $faker->realText(100),
                'meta_description' => '',
            ]);
            $imagePath = storage_path('app/public/seed-images/' . rand(1, 5) . '.jpeg');
            $image = $category
                ->addMedia($imagePath)
                ->preservingOriginal()
                ->toMediaCollection('image');
            $category->update(['image' => $image->id . '/' . $image->file_name]);
        }

        // $this->command->info('Sleeping For 5 Seconds!');
        // sleep(5);

        for ($i = 0; $i < $articles_count; $i++) {
            $this->command->info('creating article with title ' . $faker->realText(50));
            $article = \App\Models\Article::firstOrCreate([
                'user_id' => \App\Models\User::firstOrFail()->id,
                'slug' => uniqid() . rand(1, 10000),
                'title' => $faker->realText(50),
                'description' => $faker->realText(10000),
            ]);

            $mainImagePath = storage_path('app/public/seed-images/' . rand(1, 5) . '.jpeg');

            $main_image = $article
                ->addMedia($mainImagePath)
                ->preservingOriginal()
                ->toMediaCollection('main_image');
            $article->update(['main_image' => $main_image->id . '/' . $main_image->file_name]);
            $article->categories()->sync(\App\Models\Category::inRandomOrder()->first()->id);
        }
    }
}
