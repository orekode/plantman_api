<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'first_name' => 'Habi',
        //     'last_name' => 'Admin',
        //     'number' => '0508809987',
        //     'location' => 'Habi International',
        //     'password' => bcrypt('password'),
        // ]);

        $this->call([
            BlogCategorySeeder::class,
            BlogArticleSeeder::class,
        ]);
    }
}
