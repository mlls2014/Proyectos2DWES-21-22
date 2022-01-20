<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i <= 10; $i++) {
            // DB::insert('insert into usuarios (nombre, sueldo, cuota) values (?, ?, ?)',
            // ['Usuario ' . $i, $i, $i]);

            DB::table('usuarios')->insert(
                array(
                    'nombre' => 'Usuario ' . $i,
                    'sueldo' => $i,
                    'cuota' => $i
                )
            );
        }
        $this->command->info('La tabla de usuarios se rellenó correctamente!!:)');
    }
}
