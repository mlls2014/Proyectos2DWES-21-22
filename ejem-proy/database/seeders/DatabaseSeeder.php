<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    * Esta es la función que se ejecuta cuando hacemos php artisan db:seed
    * @return void
    */
   public function run()
   {
      // \App\Models\User::factory(10)->create();
      //Para llamar a otros seeder sin tener que especificar --class como en php artisan db:seed --class=FruitSeeder
      // $this->call([
      //    FruitSeeder::class,
      // ]);

      // Podemos también usar nuestros modelos ORM y crear los registros que queramos
      // Como ejemplo simple aquí crearíamos un nuevo registro curso al ejecutar db:seed
      // $curso = new Curso();

      // $curso->nombre = 'PHP';
      // $curso->descripcion = "Laravel";
      // $curso->precio = 2;
      // $curso->save();

      // Lo ideal sería crear una Clase para implementar todo el código necesario para el seed de la tabla cursos
      // php artisan make:seeder CursoSeeder

      // Para llenar la tabla Curso con 50 registros creados mediante un factory
      Curso::factory(50)->create();  // Se puede hacer aquí o en el Seeder

   }
}
