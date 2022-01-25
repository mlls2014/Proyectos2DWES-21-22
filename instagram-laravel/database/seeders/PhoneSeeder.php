<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PhoneSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      DB::insert("INSERT INTO phones VALUES(NULL, 1, '666666666', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO phones VALUES(NULL, 2, '777666666', CURTIME(), CURTIME())");
   }
}
