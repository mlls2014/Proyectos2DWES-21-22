<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::prefix('users')->group(function () {
    Route::get('index',[UserController::class,'index'])->name('users.index');
    Route::get('show/{id}', [UserController::class, 'show']);
    Route::get('create',[UserController::class,'create']);
    Route::post('store',[UserController::class,'store']);
    Route::get('destroy/{id}',[UserController::class,'destroy']);
    Route::get('edit/{id}',[UserController::class,'edit']);
    Route::post('update',[UserController::class,'update']);
 });

require __DIR__.'/auth.php';
