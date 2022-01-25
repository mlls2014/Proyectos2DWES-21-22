<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Convención usada para la tabla asociada a este modelo: snake case: nombre de clase en plural images.
// AirTrafficController se correspondería con la tabla air_traffic_controllers
// para no usar esta convención se usa protected table
// protected $table = 'otro_nombre';

// Eloquent también asume que la tabla tiene un campo clave primaria que se llama id autoincremental
// Para cambiar la convención
// protected $primaryKey = 'otro_id';

// Eloquent espera encontrar los campos timestamps created_at y updated_at en las tablas

class Image extends Model
{
   use HasFactory;

   // Establecemos la tabla asociada al modelo. No sería necesario al seguir la convención
   protected $table = 'images';

   //Definimos la relación One To Many con la tabla 'comments'
   public function comments()
   {
      // Método que devuelve un array de objetos con los comentarios asociados a la imagen
      return $this->hasMany(Comment::class);
   }

   //Definimos la relación One To Many con la tabla 'likes'
   public function likes()
   {
      // Este método devuelve el array de objetos con los likes asociados a la imagen
      return $this->hasMany(Like::class);
   }
   //Definimos la relación Many To One con la tabla 'users'
   public function user()
   {
      // Este método devuelve el objeto Usuario que ha creado la imagen
      // El segundo parámetro sirve para indicar el nombre del campo clave ajena que hace referencia 
      // a la tabla users en la tabla images. Por defecto Eloquent considera que es user_id (nombretabla_id)
      // por lo que no sería necesario especificar este segundo parámetro
      return $this->belongsTo(User::class, 'user_id');
   }

   /**
    * Podemos, si es necesaria para nuestro proyecto, implementar la relación Many to Many que existe entre users e images
    * En este caso son dos relaciones construidas en las tablas likes y comments
    * 
    */
    public function commentOwners()
    {
        return $this->belongsToMany(User::class, 'comments', 'image_id', 'user_id');
    }

    public function likesOwners()
    {
        return $this->belongsToMany(User::class, 'likes', 'image_id', 'user_id');
    }
}
