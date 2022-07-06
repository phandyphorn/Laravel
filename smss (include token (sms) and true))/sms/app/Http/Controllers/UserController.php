<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // public function getUser(){
    //     return User::with('posts','comments')->get();
    // }

    // public function getUserOne($id){

    //     // return User::findOrFail($id);
    //     return User::findOrFail($id)::with('posts','comments')->get();
    // }

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

        // We do not use Token but we use JWT. ================

        // $token = $user->createToken ('myToken')->plainTextToken;
        // $response = [
        //     'user' => $user,
        //     'token' => $token
        // ];
        return response()->json(['Message'=>'Registered already']);
    }
    public function login(Request $request) {
        // check email
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required',
        //  ]);
   
        //  $user = User::where('email', $request->email)->first();
   
        //  if (!$user || !Hash::check($request->password, $user->password)) {
        //     return response('Login invalid', 503);
        //  }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['Message'=>'Invalid!']);
        }
        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt', $token, 60 * 24);
        // return $user->createToken($request->email)->plainTextToken;
        return response()->json(['Message'=>'success', 'token'=>$token], 200)->withCookie($cookie);
    }


    public function logout(Request $request) {
        // auth()->user()->tokens()->delete();
        // return response()->json(['Message'=>'Successfully logged out']);

        $cookie = Cookie::forget('jwt');
        return response()->json(['Message'=>'Logged out'])->withCookie($cookie);
    }
}
