<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
   use HasFactory;

   /**
    * Obtener el usuario que posee el teléfono
    * Se quiere obtener el User cuya id está contenida en el user_id de phones
    * Es igual que lo que usaríamos en una relación One to Many en la parte del Muchos
    */
   public function user()
   {
      return $this->belongsTo(User::class);
      //Si no respetamos el convenio de nombre de claves ajenas, podemos especificar el nombre de la clave ajena como segundo parámetro
      //return $this->belongsTo(User::class, 'foreign_key');
      /**
       *  Si el modelo principal no se usa idcomo su clave principal, o si desea encontrar el modelo asociado usando una columna diferente, 
       * puede pasar un tercer argumento al belongsTométodo que especifica la clave personalizada de la tabla principal:
      */
      //return $this->belongsTo(User::class, 'foreign_key', 'owner_key');
   }
}
