<?php


use App\Http\Controllers\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Registration;
use App\Http\Controllers\PostController;

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
Route::get('/logout',[Login::class,'destroy']);
