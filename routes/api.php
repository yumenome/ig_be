<?php

use App\Http\Controllers\api\AuthControler;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerFollowedController;
use App\Http\Controllers\Post_LikeController;
use App\Http\Controllers\PostContorller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/users', UserController::class);
    Route::get('/user', function (Request $request) {
        return auth()->user();
    });
    Route::post('/logout',[AuthControler::class, 'logout']);
    Route::apiResource('/posts', PostContorller::class);


    Route::post('/{post}/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{id}', [CommentController::class, 'destory']);



    Route::post('/posts/{post}/like', [Post_LikeController::class, 'like']);
    Route::post('/posts/{post}/unlike', [Post_LikeController::class, 'unlike']);


    Route::post('/users/{user}/follow', [FollowerFollowedController::class, 'follow']);
    Route::post('/users/{user}/unfollow', [FollowerFollowedController::class, 'unfollow']);
});



Route::post('/signup',[AuthControler::class, 'signup']);
Route::post('/login', [AuthControler::class, 'login']);
