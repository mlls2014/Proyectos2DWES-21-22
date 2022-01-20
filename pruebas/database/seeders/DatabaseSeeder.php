<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
                array(
                    'name' => 'Admin',
                    'password' => '1',
                    'email' => 's@s.es'
                )
            );
        \App\Models\User::factory(10)->create();

        $this->call([
            UsuariosSeeder::class,

        ]);

    }
}
