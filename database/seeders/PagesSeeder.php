<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Page::firstOrCreate([
            'user_id' => 1,
            'title' => 'الرئيسية',
            'title_en' => 'home',
            'slug' => 'home',
            'removable' => 0,
            'home' => 1,
        ]);

        /* terms */
        Page::firstOrCreate([
            'user_id' => 1,
            'title' => 'شروط الاستخدام',
            'title_en' => 'terms',
            'slug' => 'terms',
            'removable' => 0,
        ]);

        /* privacy */
        Page::firstOrCreate([
            'user_id' => 1,
            'title' => 'سياسة الخصوصية',
            'title_en' => 'privacy',
            'slug' => 'privacy',
            'removable' => 0,
        ]);

        /* about */
        Page::firstOrCreate([
            'user_id' => 1,
            'title' => 'معلومات عنا',
            'title_en' => 'about',
            'slug' => 'about',
            'removable' => 0,
        ]);

    }
}
