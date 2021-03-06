<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;

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

/*Route::get('/', function () {
    return view('welcome');
});

*/
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/noticia/view/{id}',[HomeController::class, 'view'])->name('view');

Route::prefix('/admin')->group(function(){
    Route::get('/login',[AdminController::class, 'login'])->name('login');
    Route::post('/login',[AdminController::class, 'loginAction']);
    Route::post('/logout',[AdminController::class,'logout']);
    //Route::get('/register',[AdminController::class, 'register']);
    //Route::post('/register',[AdminController::class,'registerAction']);

    

    Route::resource('users', UsuariosController::class);
    Route::resource('noticias', NoticiasController::class);
    Route::resource('categorias', CategoriasController::class);
    Route::get('/',[AdminController::class, 'index']);
});