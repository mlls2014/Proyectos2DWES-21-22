<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UserController extends Controller
{
   /**
    * Crea una nueva instancia del controlador
    */
   public function __construct()
   {
      //Garantiza que los métodos del controlador sean con usuario autenticado. Esto se puede hacer también en la ruta
      $this->middleware('auth');
   }

   public function config()
   {
      return view('user.config');
   }

   public function update(Request $request)
   {
      $user = User::find(Auth::user()->id);

      $request->validate([
         'name' => 'required|string|max:255',
         'surname' => 'required|string|max:255',
         'nick' => 'required|string|max:100|unique:users,nick,' . $user->id,
         'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
         'password' => 'required|string|confirmed|min:1',
      ]);


      //Subir la imagen
      $image= $request->file('image');
      // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
      // Para ello utilizaremos un objeto storage de Laravel
      if($image){
         // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
         $image_name =  time() . $image->getClientOriginalName();
         // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
         // donde se almacenó y guardamos la imagen recibida con el nombre generado
         Storage::disk('users')->put($image_name, File::get($image));
         $user->image = $image_name;
      }
      $user->name = $request->name;
      $user->surname = $request->surname;
      $user->nick = $request->nick;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);

      $user->save();

      return redirect()->route('config')->with(['status'=>'Configuración modificada con éxito']);
   }

   /**
    * Devuelve la imagen avatar del usuario
    *
    * @param [type] $filename
    * @return void
    */
   public function getImage($filename){
      $file = Storage::disk('users')->get($filename);
      return new Response($file, 200);
   }

   public function profile($id){
      $user = User::find($id);
      return view('user.profile',[
         'user' => $user
      ]);

   }

}
