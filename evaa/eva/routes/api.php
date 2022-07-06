<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;

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
Route::get('/users/$id', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/$id', [UserController::class, 'update']);
Route::delete('/users/$id', [UserController::class, 'destroy']);


Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/$id', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/$id', [CategoryController::class, 'update']);
Route::delete('/categories/$id', [CategoryController::class, 'destroy']);


Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/$id', [ItemController::class, 'show']);
Route::post('/items', [ItemController::class, 'store']);
Route::put('/items/$id', [ItemController::class, 'update']);
Route::delete('/items/$id', [ItemController::class, 'destroy']);

