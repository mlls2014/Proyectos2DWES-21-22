<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
   use HasFactory;

   // Establecemos la tabla asociada al modelo
   protected $table = 'likes';
   
   //Definimos la relación Many To One con la tabla 'images'
   public function image()
   {
      // Este método devuelve el objeto Imagen del que se ha hecho el Like
      return $this->belongsTo(Image::class, 'image_id');
   }
   //Definimos la relación Many To One con la tabla 'users'
   public function user()
   {
      // Este método devuelve el objeto Usuario que ha hecho el Like
      return $this->belongsTo(User::class, 'user_id');
   }
}
