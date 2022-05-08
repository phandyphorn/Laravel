<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/items',function() {
    return "This is GET request for all items";
});

Route::get('/items/{id}',function($id) {
    return "This is GET rquest for one item by $id";
});

Route::post('/items',function() {
    return "This is POST rquest for one item.";
});

Route::put('/items/{id}',function($id) {
    return "This is PUT rquest for update one item by $id";
});

Route::delete('/items/{id}',function($id) {
    return "This is GET rquest for delete one item by $id";
});

// ======================================
Route::get('/students',function() {
    return "This is GET request for all students";
});

Route::get('/students/{id}',function($id) {
    return "This is GET rquest for one student by $id";
});

Route::post('/students',function() {
    return "This is POST rquest for one student.";
});

Route::put('/students/{id}',function($id) {
    return "This is PUT rquest for update one student by $id";
});

Route::delete('/students/{id}',function($id) {
    return "This is GET rquest for delete one student by $id";
});

$array = [
    ['name' => 'Bopha', 'age' => 18],
    ['name' => 'Bora', 'age' => 19],
    ['name' => 'Soda', 'age' => 20]
];

Route::get('/array',function() {
    // return "This is GET request array";










    
});