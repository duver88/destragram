<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\validar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use Illuminate\Container\Attributes\Auth;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ModificarPerfil;
use App\Http\Controllers\RegisterController;
use App\Models\Follower;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/crear-cuentaa', [RegisterController::class, 'index'])->name('register');
Route::post('/crear-cuentaa', [RegisterController::class, 'store'])->name('crearcuneta');
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
//editar Perfil

Route::get('/editar-perfil', [ModificarPerfil::class, 'index'])->name('modificar.index')->middleware(validar ::class.':validar');
Route::post('/editar-perfil', [ModificarPerfil::class, 'store'])->name('modificar.store');

//Rutas
Route::get('/{user:username}', [PostController::class, 'index'])->name('post.index');
//View post
Route::post('/post', [PostController::class,'store'])->name('post.store')->middleware(validar ::class.':validar');
Route::get('/post/create', [PostController::class, 'create'])->name('create.index')->middleware(validar ::class.':validar');

Route::get('/{user:username}/post/{post}', [PostController::class, 'show'])->name('posts.show')->withoutMiddleware([validar::class. 'valirdar']);
//Imagen Controller
Route::post('/imagen', [ImagenController::class, 'store'])->name('imagen.index');
//Comentarios 
Route::post('/{user:username}/post/{post}', [ComentarioController::class, 'store'])->name('comentarios.store')->withoutMiddleware([validar::class. 'valirdar']);
//Eliminar Comentarios 
Route::delete('/post/{post}', [PostController::class,'destroy'])->name('posts.destroy');

Route::post('/post/{post}/like', [LikeController::class, 'store'])->name('post.like.store');

Route::delete('/post/{post}/like', [LikeController::class, 'destroy'])->name('post.like.destroy');

//siguinedo usuarios 

Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name('users.flowoller');

Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name('users.unflowoller');


