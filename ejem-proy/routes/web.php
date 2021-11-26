<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   return view('welcome');
});

/**
 * Código de prueba de los temas de clase
 */
Route::get('/mi-url', function () {
   return "Hola mundo:)";
});

Route::get('/libros', function () {
   return view('libros');
});

Route::post('/libros', function (Request $request) {
   $titulo = $request->input('titulo');
   $autor = $request->input('autor');
   return view('reglibro', array(
      'titulo' => $titulo,
      'autor' => $autor
   ));
});

Route::get('/libros/{genero}', function ($genero) {
   return "<h1>Libros del género: {$genero}</h1>";
});

Route::get('posts/{post_id}/comments/{comment_id}', function ($postId, $commentId) {
   return "Este es el comentario $commentId del post $postId";
});

Route::get('/libros/{genero?}', function ($genero = null) {
   if ($genero == null) {
      return view('libros'); //muestra la lista 
   }
   return "Lista de libros del género: {$genero}";
});



// Route::get('user/{id}', function ($id) {
//    return $id;
// })->where(['id' => '[\d]+']);

// Route::get('user/{op}', function ($op) {
//    return $op;
// })->where(['op' => 'create|delete|update']);

// Route::get('user/{name}', function ($name) {
//    return "El nombre es " . $name;
// })->where(['name' => '[-\w]+']);

// Route::get('/mostrar-fecha', function () {
//    echo "<b>Fecha actual:</b>" . date('d-m-Y');
//    echo "<br/><a href='/'>Inicio</a>";
// });

// Route::get('/mostrar-fecha', function () {
//    return view('mostrar-fecha');
// });

// Route::get('/mostrar-fecha', function () {
//    $titulo = ":O Mostrando la fecha actual...";
//    return view('mostrar-fecha', array(
//       'titulo' => $titulo
//    ));
// });

// Route::get('/pelicula', function () {
//    return view('pelicula', array(
//       'titulo' => 'home'
//    ));
// });

// Route::get('/pelicula/{titulo}', function ($titulo) {
//    return view('pelicula', array(
//       'titulo' => $titulo
//    ));
// });

// Route::get('/pelicula/{titulo?}', 
//  function($titulo='No se especificó una película'){
//  return view('pelicula', array(
//              'titulo' => $titulo  ));
// });

// Route::get(
//    '/pelicula/{titulo}',
//    function ($titulo = 'No se especificó una película') {
//       return view('pelicula', array(
//          'titulo' => $titulo
//       ));
//    }
// )->where(array(
//    'titulo' => '[a-z]+'
// ));

// Route::get(
//    '/pelicula/{titulo}/{anyo?}',
//    function (
//       $titulo = 'No se especificó una película',
//       $anyo = 2019
//    ) {
//       return view('pelicula', array(
//          'titulo' => $titulo,
//          'anyo'   => $anyo
//       ));
//    }
// )->where(array(
//    'titulo' => '[a-z]+',
//    'anyo'   => '[0-9]+'
// ));

// Route::get('/saludo', function () {
//    return view('Inicio', [
//       'nombre' => 'Pepe'
//    ]);
// });

// Route::get('/listado-peliculas', function () {
//    $titulo = 'Listado de películas';
//    return view('peliculas.listado', array(
//       'titulo' => $titulo
//    ));
// });

// Route::get('/includes',function(){
//    return view('body');
// });

// Route::get('/listado-peliculas', function () {
//    $titulo = 'Listado de películas';
//    $listado = array('Batman', 'Spiderman', 'Gran Torino');
//    return view('peliculas.listado')
//       ->with('titulo', $titulo)
//       ->with('listado', $listado);
// });

// Route::get('/pagina-generica', function(){
//    return view('pagina');
// });

// CONTROLADORES
// use App\Http\Controllers\PeliculaController;

// Route::get('/peliculas', [PeliculaController::class, 'index']);



/**
 * ¡Ojo! Cambio en la forma de llamar a los controladores en Laravel 8. 
 */
// Route::get('/peliculas','App\Http\Controllers\PeliculaController@index');

// Route::get('/peliculas/{pagina?}', [PeliculaController::class, 'index']);


// RESOURCES
// use App\Http\Controllers\FotoController;
// Route::get('/foto/popular',[FotoController::class, 'getPopular']);
// Route::resource('foto',FotoController::class);

// use App\Http\Controllers\UsuarioController;

// Route::resource('usuarios', UsuarioController::class);
// Route::resource('usuarios', UsuarioController::class)->names([
//    'create' => 'usuarios.build'
// ]);
// // Route::get('/detalle',[PeliculaController::class,'detalle']);
// // Para dar nombre a esa ruta
// Route::get('/detalle/{year?}', [PeliculaController::class, 'detalle'])
//    ->name('detalle.pelicula')
//    ->middleware('testyear');

// Route::get('/redirigir', [PeliculaController::class, 'detalle']);

// Route::get('/detalle',[
//    'uses' => [PeliculaController::class,'detalle'],
//    'as'   => 'detalle.pelicula'
// ]);

// FORMULARIOS 

// Route::get('/formulario', [PeliculaController::class,'formulario']);
// Route::post('/recibir', [PeliculaController::class,'recibir']);

// BASE DE DATOS

// use App\Http\Controllers\FrutaController;

// Route::prefix('frutas')->group(function () {
//    Route::get('index',[FrutaController::class,'index']);
//    Route::get('detalle/{id}', [FrutaController::class, 'detalle']);
//    Route::get('crear',[FrutaController::class,'crear']);
//    Route::post('guardar',[FrutaController::class,'guardar']);
//    Route::get('eliminar/{id}',[FrutaController::class,'eliminar']);
//    Route::get('editar/{id}',[FrutaController::class,'editar']);
//    Route::post('update',[FrutaController::class,'update']);
// });
