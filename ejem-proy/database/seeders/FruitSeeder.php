<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FruitSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      for ($i = 0; $i <= 10; $i++) {
         DB::table('frutas')->insert(
            array(
               'nombre' => 'Cereza' . $i,
               'descripcion' => 'Descripción de la fruta ' . $i,
               'precio' => $i,
               'fecha'  => date('Y-m-d')
            )
         );
      }
      $this->command->info('La tabla de frutas se rellenó correctamente!!:)');
   }
}
