<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users_posts_comments', [UserController::class,'getUserWithPostAndComments']);
Route::get('/users_posts_comments_likes', [UserController::class,'getUserWithPostAndCommentsLikes']);
Route::get('/users_posts_comments_likes/{id}', [UserController::class, 'getSingleUserWithPostsCommentsLikes']);
Route::get('/count_posts_comments', [UserController::class, 'countPostsAndCommentsOfEachUser']);

Route::get('/posts', [PostController::class, 'index']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/comments', [CommentController::class, 'index']);
Route::post('/comments', [CommentController::class, 'store']);

Route::get('/likes', [LikeController::class, 'index']);
Route::post('/likes', [LikeController::class, 'store']);

