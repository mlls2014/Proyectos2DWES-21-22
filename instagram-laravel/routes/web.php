<?php

use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

use App\Helpers\FormatTime;


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


Route::get('/prueba', function () {

   FormatTime::LongTimeFilter(date('Y-m-d H:i:s'))   ;
}
);

Route::get('/', function () {
    return view('auth.login');})->middleware('guest');

// Se comprueba que está autenticado correctamente en middleware(['auth'])
Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// El middleware de autenticación ya se añadió en el controlador, pero se pone aquí de manera didáctica.
Route::get('/user/configuracion', [UserController::class,'config'])->middleware(['auth'])->name('config');

Route::post('/user/update', [UserController::class,'update'])->middleware(['auth'])->name('user.update');

Route::get('user/avatar/{filename}', [UserController::class,'getImage'])->middleware(['auth'])->name('user.avatar');

Route::get('/user/profile/{id}', [UserController::class,'profile'])->middleware(['auth'])->name('user.profile');

Route::get('/images/create', [ImageController::class,'create'])->name('images.create');

Route::get('/images/{image}', [ImageController::class,'show'])->name('images.show');

Route::post('/images', [ImageController::class,'store'])->name('images.store');

Route::get('/images/file/{filename}', [ImageController::class,'getImage'])->name('image.file');

Route::post('/comments', [CommentController::class,'store'])->name('comments.store');

Route::get('/comments/delete/{id}', [CommentController::class,'delete'])->name('comments.delete');

Route::get('/likes/{image_id}', [LikeController::class,'like'])->name('likes.save');

Route::get('/likes/delete/{image_id}', [LikeController::class,'dislike'])->name('likes.delete');

Route::get('/likes', [LikeController::class,'index'])->name('likes.index');











// Pruebas de uso de la BD
// use App\Models\Image;

// Route::get('/imagenes', function () {
//    $images = Image::all();
//    foreach ($images as $image) {
//       var_dump($image);
//    }
//    die();
// });

// Route::get('/imagenes1', function () {
//    $images = Image::all();
//    foreach ($images as $image) {
//       echo $image->image_path  . "<br/>";
//       echo $image->description  . "<br/>";
//       echo "<hr/>";
//    }
//    die();
// });

// Route::get('/imagenes2', function () {
//    $images = Image::all();
//    foreach ($images as $image) {
//       echo $image->image_path  . "<br/>";
//       echo $image->description  . "<br/>";
//       echo $image->user->name  . ' ' .  $image->user->surname;
//       echo "<hr/>";
//    }
//    die();
// });

// Route::get('/imagenes3', function () {
//    $images = Image::all();
//    foreach ($images as $image) {
//       echo $image->image_path  . "<br/>";
//       echo $image->description  . "<br/>";
//       echo $image->user->name  . ' ' .  $image->user->surname;
//       // Añadimos un bucle para recorrer los comentarios de la imagen 
//       if (count($image->comments) >= 1) {
//          echo '<br/>' . '<strong>Comentarios</strong>';
//          echo '<ul>';
//          foreach ($image->comments as $comment) {
//             echo '<li>';
//             echo $comment->user->name  .   '  '   .  $comment->user->surname   . ':';
//             echo $comment->content;
//             echo '</li>';
//          }
//          echo '</ul>';
//       }
//       echo "<hr/>";
//    }
//    die();
// });
