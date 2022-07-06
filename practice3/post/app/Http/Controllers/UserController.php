<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return User::all();
        return User::with('posts','comments')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required|min:3|max:15',
            'email'=>'string|required|email|unique:users',
            'password'=>'string|required|confirmed'
        ],
        [
            'name.min' => 'Your name must have more than 3 character.',
            'name.max' => 'Your name must have lower than 15 characters.',
            'email.email' => 'You have to make your email be professional.'
        ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return response()->json(['message'=>"User added successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'string|required|min:3|max:15',
            'email'=>'string|required|email|unique:users',
            'password'=>'string|required|confirmed'
        ],
        [
            'name.min' => 'Your name must have more than 3 character.',
            'name.max' => 'Your name must have lower than 15 characters.',
            'email.email' => 'You have to make your email be professional.'
        ]
        );

        
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $user->save();
        return response()->json(['message'=>"User updated successfully!"]);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}   

   

