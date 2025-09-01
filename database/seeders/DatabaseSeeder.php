<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TagSeeder::class,
            UsersSeeder::class,
            SettingsSeeder::class,
            PagesSeeder::class,
            MenusSeeder::class,
            PermissionsSeeder::class,
            AttachSuperAdminPermissions::class,
            ContentSeeder::class
        ]);
        \App\Models\Category::factory(5)->create();
        \App\Models\Course::factory(10)
            ->hasModules(3)
            ->hasReviews(5)
            ->create();

        cache()->flush();
    }
}
