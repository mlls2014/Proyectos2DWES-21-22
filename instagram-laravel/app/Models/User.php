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
      'nick',
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

   //Definimos la relación Uno a Uno  con la tabla Phones. hasOne sirve para acceder al registro de phones asociado al usuario. Se 
   //supone que en la tabla phones existe un campo user_id fireng key a users
   public function phone()
   {
       return $this->hasOne(Phone::class);
   }

   /**
    * Podemos, si es necesaria para nuestro proyecto, implementar la relación Many to Many que existe entre users e images
    * En este caso son dos relaciones construidas en las tablas likes y comments
    * 
    */
    public function commentImages()
    {
        return $this->belongsToMany(Image::class, 'comments', 'user_id', 'image_id')->withPivot('content', 'created_at');
        // withPivot sirve para poder acceder a los campos propios de la tabla n:m en este caso comments
    }

    public function likeImages()
    {
        return $this->belongsToMany(Image::class, 'likes', 'user_id', 'image_id');
    }
}
