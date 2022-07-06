<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

    public function getUserWithPostAndComments(){
        return User::with('posts','posts.comments')->get();
    }

    public function getUserWithPostAndCommentsLikes(){
        return User::with('posts', 'posts.comments', 'posts.likes')->get();
    }

    public function getSingleUserWithPostsCommentsLikes($id){
        return User::with('posts','posts.comments', 'posts.likes')->findOrFail($id);
    }

    public function countPostsAndCommentsOfEachUser(){
        return User::withCount('posts','comments')->get();
    }
}
