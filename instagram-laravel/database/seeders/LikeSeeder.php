<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::insert("INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME())");
      DB::insert("INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME())");
      DB::insert("INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME())");
      DB::insert("INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME())");
      DB::insert("INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME())");
    }
}

