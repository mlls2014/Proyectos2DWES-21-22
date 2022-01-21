<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::insert("INSERT INTO images VALUES(NULL, 1, 'bambu.jpg', 'Cañas de bambú', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 1, 'costa.jpg', 'Imagen de costa y playa', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 2, 'flores.jpg', 'Gran campo de flores', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 2, 'montañas.jpg', 'Preciosas montañas', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 2, 'parqueatrac.jpg', 'Un día en el parque de atracciones', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 3, 'puente.jpg', 'Estructura de hierro en la playa', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 3, 'globo.jpg', 'Globo en el aire', CURTIME(), CURTIME())");
      DB::insert("INSERT INTO images VALUES(NULL, 3, 'bici.jpg', 'Mujer en bicicleta', CURTIME(), CURTIME())");
    }
}