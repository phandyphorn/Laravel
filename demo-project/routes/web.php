<?php

use Illuminate\Support\Facades\Route;

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
// Return by using views foler mean that there are .php file in the views
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

// Just return Sentences.
Route::get('/teachers', function () {
    return ("Good Morning Teacher!");
});

Route::get('/students/{id}/age/{age}', function ($id, $age) {
    return "student id: ".$id. "and student age:" .$age;
});

Route::get('/task/{title?}', function($task = null) {
    return "Task title : ". $task;
});


Route::get('/task/{title?}', function($task = "homework") {
    return "Task title : ". $task;
});
// =======================================================
Route::get('/items/{book}/price/{price}', function($book, $price) {
    return "Items : ". $book . " price ". $price;
});

Route::get('/books/{book}/price/{price?}', function($book, $price = null) {
    return "Item : ". $book . " price ". $price;
});


Route::get('/request/{param}', function($param) {
    return "Result: ". $param;
})->where('parameter', 'expression');


Route::get('/titles/{title}' , function($task){
    return "Task title :".$task; 
})->where('title', '[A-Za-z]+');

Route::get('/password/{id}', function($id){
    return "Task id: ". $id;
})->where('id', '[0-9]+');


Route::get('/titles/{title}/password/{password', function($title, $pasword){
    return "result: ".$title. $pasword;
})->where(['id'=>'[0-9]+', 'name'=> '[a-z]+']);


// Fallback routes
Route::fallback(function(){
    return "404 page not fount";
});


Route::prefix('admin')->group(function(){
    route::get('/user', function(){
        return "I am a user!!!";
    });
    route::get('products', function(){
        return "This is products";
    });
});


Route::get('/products/{book}', function($book){
    return "Book name is: ". $book;
});


// Prefix mean that the start is the same with another, that's why they use prefix.
Route::prefix("students")->group(function(){
    route::get('age', function() {
        return "I am 20 years old.";
    });
    route::get('province', function() {
        return "I am from PS province.";
    });
    route::get('score', function() {
        return "My score is not high, but I will try to get nearly 100.";
    });
});

