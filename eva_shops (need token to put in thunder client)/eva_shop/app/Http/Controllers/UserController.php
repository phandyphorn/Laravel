<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createAccount(Request $request){
        $user = new User;
        $user->name = $request->name; //$request = user submit
        $user->email = $request-> email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        $token = $user->createToken ('myToken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($response);
    }


    public function signIn(Request $request) {
        // check email
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
         ]);
   
         $user = User::where('email', $request->email)->first();
   
         if (!$user || !Hash::check($request->password, $user->password)) {
            return response('Login invalid', 503);
         }
         return $user->createToken($request->email)->plainTextToken;
    }


    public function signOut(Request $request) {
        auth()->user()->tokens()->delete();
        return response()->json(['Message'=>'Successfully logged out']);
    }
}
