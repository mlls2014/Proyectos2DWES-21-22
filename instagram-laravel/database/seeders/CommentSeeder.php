<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::insert("INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foto de familia!!', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO comments VALUES(NULL, 2, 1, 'Buena foto de PLAYA!!', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO comments VALUES(NULL, 2, 4, 'Que bueno!!', CURTIME(), CURTIME())");
    }
}