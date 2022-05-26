<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                array(
                    'name' => 'Administrador',
                    'email' => 'admin@admin.es',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$cgB3dzIEF8yFC57w9MR0fuh/cY0s0DfkeSFtyezURTwNuLDgMZiSG', // password 1
                    'remember_token' => Str::random(10),
                    'nif' => '1111X',
                    'surname' => 'Admin',
                    'address' => 'Dir Admin',
                    'telephone' => '12121',
                    'role_id' => 1,
                ),
                array(
                    'name' => 'Profe1',
                    'email' => 'profe1@gmail.es',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$cgB3dzIEF8yFC57w9MR0fuh/cY0s0DfkeSFtyezURTwNuLDgMZiSG', // password
                    'remember_token' => Str::random(10),
                    'nif' => '14Z',
                    'surname' => 'Profe1',
                    'address' => 'Dir Profe1',
                    'telephone' => '2343434',
                    'role_id' => 2,
                ),
                array(
                    'name' => 'Profe2',
                    'email' => 'profe2@gmail.es',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$cgB3dzIEF8yFC57w9MR0fuh/cY0s0DfkeSFtyezURTwNuLDgMZiSG', // password
                    'remember_token' => Str::random(10),
                    'nif' => '213F',
                    'surname' => 'Profe2',
                    'address' => 'Dir Profe2',
                    'telephone' => '34234',
                    'role_id' => 2,
                ),
            ]
        );
        \App\Models\User::factory(10)->create();
    }
}
