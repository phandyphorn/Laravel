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


// Route::get('/user',function() {
//     global $users;
//     return $users;
// });


// Route::get('/user/{userIndex}',function($userIndex){
//     global $users;
//     $userIndex = request()->userIndex;
//     for ($i=0; $i<count($users); $i++){
//         if ($userIndex == $i){
//             $result1 = $users[$userIndex];
//             return $result1;
//         }
//     }
//     $result1 = "Cannot find the user with index ". $userIndex;
//     return $result1;
// })->where('userIndex',"[0-9]+");



// Route::get('/user/{userName}', function($userName){
//     global $users;
//     $userName = request()->userName;
//     for ($i=0; $i<count($users); $i++){
//         if ($userName == $users[$i]["name"]){
//             $result = $users[$i];
//             return $result;
//         }
//     }
//     return "Cannot find the user with the name ". $userName;
// })->where('name', '[A-Za-z]+');


Route::prefix('user')->group(function(){
    route::get('/',function() {
        global $users;
        return $users;
    });

    route::get('/{userIndex}',function($userIndex){
        global $users;
        $userIndex = request()->userIndex;
        for ($i=0; $i<count($users); $i++){
            if ($userIndex == $i){
                $result1 = $users[$userIndex];
                return $result1;
            }
        }
        $result1 = "Cannot find the user with index ". $userIndex;
        return $result1;
    })->where('userIndex',"[0-9]+");


    route::get('/{userName}', function($userName){
        global $users;
        $userName = request()->userName;
        for ($i=0; $i<count($users); $i++){
            if ($userName == $users[$i]["name"]){
                $result = $users[$i];
                return $result;
            }
        }
        return "Cannot find the user with the name ". $userName;
    })->where('name', '[A-Za-z]+');
});

// ===================================================================

Route::prefix('user/{userIndex}/post')->group(function(){
    route::get('/',function() {
        global $users;
        return $users;
    });

    route::get('/{postIndex}',function($postIndex){
        global $users;
        $postIndex = request()->postIndex;
        $userIndex = request()->userIndex;
        for ($i=0; $i<count($users); $i++){
            if ($userIndex == $i){
                for ($p=0; $p<count($users[$i]["posts"]); $p++){
                    if ($p == $postIndex){
                        return $users[$i]["posts"][$p];
                    }
                }
                return "Can not find the post with id ".$postIndex. " for user ".$i;
            };
        }
    })->where('userIndex',"[0-9]+");
});


// Fallback routes
Route::fallback(function(){
    return "You cannot get the user like this!!!";
});


