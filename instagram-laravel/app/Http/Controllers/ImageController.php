<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Image;
use Illuminate\Http\Response;

class ImageController extends Controller
{
   /**
    * Crea una nueva instancia del controlador
    */
   public function __construct()
   {
      //Garantiza que los métodos del controlador sean con usuario autenticado. Esto se puede hacer también en la ruta
      $this->middleware('auth');
   }

   public function create()
   {
      return view('image.create');
   }

   public function store(Request $request)
   {
      //Validación
      $request->validate([
         'description' => 'required|string',
         'image_path' => 'required|image',
      ]);
      //Recoger datos
      $image_path = $request->file('image_path');
      $description = $request->description;

      $user = Auth::user();
      $image = new Image();
      $image->user_id = $user->id;
      $image->image_path = null;
      $image->description = $description;

      //Subir fichero
      if ($image_path) {
         // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
         $image_path_name =  time() . $image_path->getClientOriginalName();
         Storage::disk('images')->put($image_path_name, File::get($image_path));
         $image->image_path = $image_path_name;
      }

      $image->save();

      return redirect()->route('dashboard')->with(['status'=>'La imagen ha sido subida con éxito']);
   }

    /**
    * Devuelve la imagen avatar del usuario
    *
    * @param [type] $filename
    * @return void
    */
    public function getImage($filename){     
      $file = Storage::disk('images')->get($filename);
      return new Response($file, 200);
   }

   public function show($id){
      $image = Image::find($id);
      return view('image.show',['image'=>$image]);
   }

}
