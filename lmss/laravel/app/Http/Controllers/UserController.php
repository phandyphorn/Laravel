<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'name'=>'string|required|min:5|max:15',
            'password'=>'string|required|min:6|max:20'
        ],
        [
            'name'=> "Name must be more than 5 and less than 15.",
            'password.max'=>"Password must be less than 20"
        ]);
        
        $user = new User();
        $user->name = $request->name; //$request = user submit
        $user->email = $request-> email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message'=>"User are already registered"]);
    }


    public function login(Request $request) {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['Message'=>'Invalid!']);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        return response()->json(['Message'=>'success', 'token'=>$token], 200)->withCookie($cookie);
    }


    public function logout(Request $request){
        $cookie = Cookie::forget('jwt');
        return response()->json(['Message'=>'Logged out'])->withCookie($cookie);
    }

}
