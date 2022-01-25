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
        // \App\Models\User::factory(10)->create();

        //Para llamar al run de los seeders
        $this->call([
         UserSeeder::class,
         ImageSeeder::class,
         CommentSeeder::class,
         LikeSeeder::class,
         PhoneSeeder::class,
     ]);
    }
}
