<?php

use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminPostController;

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

Route::get('/', [PostController::class,'index']);

Route::get('/posts/{post}',[PostController::class,'showOnePost']);

// Register routes
Route::get('/register',[Registration::class,'create'])->middleware('guest');
Route::post('/register',[Registration::class,'store'])->middleware('guest');

// Login Routes

Route::get('/login',[Login::class,'create']);
Route::post('/login',[Login::class,'store']);
Route::post('/logout',[Login::class,'destroy']);


// Comments

Route::post('posts/{post:id}/comments',[CommentController::class,'store']);


// Admin Dashboard

Route::get('dashboard',[AdminPostController::class,'show']);
Route::get('/admin/posts',[AdminPostController::class,'create']);
Route::post('/admin/posts',[AdminPostController::class,'store']);
Route::put('/admin/posts/{post:id}',[AdminPostController::class,'update']);
Route::delete('/admin/posts/{post:id}',[AdminPostController::class,'delete']);
Route::get('/admin/posts/{post:id}/edit',[AdminPostController::class,'edit']);


