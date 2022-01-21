<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
      
      // Sentecia insert sql. No es muy elegante pero te evita ejecutar scripts sql ajenos a Laravel
      DB::insert("INSERT INTO users VALUES(NULL, 'user', 'Eva', 'Robles', 'evaroblesweb', 'eva@eva.com', 
         null,'" . Hash::make('1') . "', 'ico4.jpg', null, CURTIME(), CURTIME());");

      DB::insert("INSERT INTO users VALUES(NULL, 'user', 'Juan', 'Lopez', 'juanlopez', 'juan@juan.com', 
      null, '" . Hash::make('1') . "', 'ico1.jpg', null, CURTIME(), CURTIME());");

      // Mediante Query Builder
      DB::table('users')->insert([
         'name' => 'Andrés',
         'role' => 'user',
         'nick' => 'andrei',
         'image' => 'ico3.jpg',
         'email' => Str::random(10) . '@gmail.com',
         'password' => Hash::make('pass'),
      ]);
   }
}
