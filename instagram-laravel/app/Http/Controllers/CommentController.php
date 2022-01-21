<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
    * Crea una nueva instancia del controlador
    */
   public function __construct()
   {
      //Garantiza que los métodos del controlador sean con usuario autenticado. Esto se puede hacer también en la ruta
      $this->middleware('auth');
   }

   public function store(Request $request){

      //Validación
      $request->validate([
         'image_id' => 'required|integer',
         'content' => 'required|string',
      ]);

      //Recogida de datos
      $content = $request->input('content');
      $image_id = $request->input('image_id');

      $comment = new Comment();
      $comment->user_id = Auth::user()->id;
      $comment->image_id = $image_id;
      $comment->content = $content;

      $comment->save();

      return redirect()->route('images.show', ['image'=>$image_id])->with(['status' => __('You have published your comment correctly!')]);

   }

   public function delete($id){
      // conseguir datos del usuario logeado
      $user = Auth::user();

      // Conseguir objeto del comentario
      $comment = Comment::find($id);

      // Comprobar si soy el dueño del comentario o de la imagen publicada
      if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
         $comment->delete();
         return redirect()->route('images.show', ['image'=>$comment->image->id])->with(['status' => __('You have successfully deleted the comment!')]);
      }else{
         return redirect()->route('images.show', ['image'=>$comment->image->id])->with(['status' => __('You do not have permission to delete the comment')]);
      }
   }
}
