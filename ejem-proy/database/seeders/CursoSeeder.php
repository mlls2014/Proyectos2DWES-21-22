<?php

namespace Database\Seeders;
use App\Models\Curso;


use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // Podemos crear registros de forma simple con ORM o utilizar el facade DB como hicimos en FruitSeeder
      // $curso = new Curso();

      // $curso->nombre = 'PHP';
      // $curso->descripcion = "Laravel";
      // $curso->precio = 2;
      // $curso->save();

      // Peor lo ideal sería utilizar objetos de tipo Factory
   }
}
