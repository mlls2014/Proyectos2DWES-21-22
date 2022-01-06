<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FrutaController extends Controller
{
   public function index()
   {
      // Este ejemplo utiliza la forma más simple de acceder a una base de datos: el Facades DB https://laravel.com/api/8.x/Illuminate/Support/Facades/DB.html
      // La siguiente forma para acceder a un BD sería los query builder https://laravel.com/docs/8.x/queries
      // La forma más evoucionada sería mediante Eloquent ORM https://laravel.com/docs/8.x/eloquent 
      $frutas = DB::select('select * from frutas order by id desc');
      // Otra forma de hacerlo, aunque esta vez devuelve unz colección del tipo Illuminate\Support\Collection en vex de un array
      // El uso es similar
      // $frutas = DB::table('frutas')->get();

      return view('fruta.index', ['frutas' => $frutas]);
   }

   public function detalle($id)
   {
      $fruta = Arr::first(DB::select('select * from frutas where id = :id', ['id' => $id]));

      return view('fruta.detalle', ['fruta' => $fruta]);
   }

   public function crear()
   {
      return view('fruta.crear');
   }

   public function guardar(Request $request)
   {
      DB::insert('insert into frutas (nombre, descripcion,precio,fecha) 
                  values (:nombre,:descripcion,:precio,:fecha)', [
         'nombre' => $request->nombre,
         'descripcion' => $request->descripcion,
         'precio' => $request->precio,
         'fecha' => date('Y-m-d')
      ]);
      return redirect()->action([FrutaController::class, 'index']);
   }

   public function eliminar(Request $request, $id)
   {
      $frutas = DB::delete('delete from frutas where id = :id', ['id' => $id]);
      $request->session()->flash('status', 'Fruta eliminada correctamente!! :)');
      return redirect()->action([FrutaController::class, 'index']);
   }

   public function editar($id)
   {
      //Obtenemos el registro a editar de la base de datos
      $fruta = Arr::first(DB::select('select * from frutas where id = :id', ['id' => $id]));
      //Pasamos el objeto recuperado a la vista y lo mostramos en el formulario
      return view('fruta.crear', ['fruta' => $fruta]);
   }

   public function update(Request $request)
   {
      DB::update('update frutas SET nombre = :nombre, descripcion = :descripcion, precio = :precio, fecha = :fecha where id = :id', [
         'id'=> $request->id,
         'nombre' => $request->nombre,
         'descripcion' => $request->descripcion,
         'precio' => $request->precio,
         'fecha' => $request->fecha
      ]);
      $request->session()->flash('status', 'Fruta actualizada correctamente!! :)');
      return redirect()->action([FrutaController::class, 'index']);
   }
}
