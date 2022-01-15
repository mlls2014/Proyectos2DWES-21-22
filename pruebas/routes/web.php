<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('cursos')->group(function () {
    Route::get('/', [CourseController::class,'index']);  //   /cursos/
    Route::get('/{id}/destroy', [CourseController::class,'destroy']);  //   /cursos/3/destroy
    Route::get('/{id}/edit', [CourseController::class,'edit']);  //   /cursos/2/edit
    Route::get('/create', [CourseController::class,'create']);  //   /cursos/create
    Route::get('/{id}/show', [CourseController::class,'show']);  //   /cursos/2/show
    Route::post('/store', [CourseController::class,'store']);  //   /cursos/store
    Route::post('/{id}/update', [CourseController::class,'update']);  //   /cursos/update
});
