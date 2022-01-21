<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
   use HasFactory, Notifiable;

   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
      'name',
      'role',
      'surname',
      'email',
      'password',
   ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
      'password',
      'remember_token',
   ];

   /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
   protected $casts = [
      'email_verified_at' => 'datetime',
   ];

   // Establecemos la tabla asociada al modelo
   protected $table = 'users';

   //Definimos la relación One To Many con la tabla 'images'
   public function images()
   {
      // Este método devuelve el array de objetos con las imágenes asociadas a un usuario 
      return $this->hasMany(Image::class);
   }

   //Definimos la relación One To Many con la tabla 'likes'
   public function likes()
   {
      // Este método devuelve el array de objetos con los likes asociados a un usuario 
      return $this->hasMany(Like::class);
   }

   //Definimos la relación One To Many con la tabla 'comments'
   public function comments()
   {
      // Este método devuelve el array de objetos con los comments asociados a un usuario 
      return $this->hasMany(Comment::class);
   }
}
