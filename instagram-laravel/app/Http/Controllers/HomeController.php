<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
      $images = Image::orderBy('created_at','asc')->paginate(6);

      return view('dashboard', ['images' => $images]);
   }
}
