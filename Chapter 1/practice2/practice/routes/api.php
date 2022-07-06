<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// How to link before using it.
use App\Http\controllers\PostController;
use App\Http\controllers\TaskController;

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


Route::get('/items', [PostController::class, 'getAllItem']);

Route::get('/items/{id}', [PostController::class, 'creatItem']);

Route::post('/items', [PostController::class, 'getOneItem']);

Route::delete('/items/{id}',[PostController::class, 'creatItem']);

Route::put('/items/{id}', [PostController::class, 'creatItem']);


Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'store']);
