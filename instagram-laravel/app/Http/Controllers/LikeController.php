<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
   /**
    * Crea una nueva instancia del controlador
    */
   public function __construct()
   {
      //Garantiza que los métodos del controlador sean con usuario autenticado. Esto se puede hacer también en la ruta
      $this->middleware('auth');
   }
   
   public function index(){
      $likes = Like::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(6);

      return view('like.index', ['likes' => $likes]);
   }

   public function like($image_id)
   {
      // Recoger datos del usuario y la imagen
      $user = Auth::user();

      // Condición para ver si ya existe el like y no duplicarlo
      $isset_like = Like::where('user_id', $user->id)
         ->where('image_id', $image_id)
         ->count();

      if ($isset_like == 0) {
         $like = new Like();
         $like->user_id = $user->id;
         $like->image_id = (int) $image_id;

         // Guardar en la BD
         $like->save();

         return response()->json([
            'like' => $like
         ]);
      } else {
         return response()->json([
            'message' => "ya existe el like"
         ]);
      }
   }

   public function dislike($image_id)
   {
      // Recoger datos del usuario y la imagen
      $user = Auth::user();

      // Condición para ver si ya existe el like y no duplicarlo
      $like = Like::where('user_id', $user->id)
         ->where('image_id', $image_id)
         ->first();

      if ($like) {
        
         // Eliminar el like
         $like->delete();
         return response()->json([
            'like' => $like,
            'message' => 'Has dado dislike correctamente'
         ]);
      } else {
         return response()->json([
            'message' => "No existe el like"
         ]);
      }
   }

}
