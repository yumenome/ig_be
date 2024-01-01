<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthControler;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\Post_LikeController;
use App\Http\Controllers\PostContorller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post',[Post_LikeController::class,'like']);
Route::get('/user',[UserController::class,'show']);


