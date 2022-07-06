<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Post::all();
        return Post::with('users','comments')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request-> description;
        $post->user_id = $request->user_id;

        $file = $request->file('image'); 
        $filePath = public_path('/Image'); 
        if($file){ 
            $filename= uniqid() . '-' .trim($file->getClientOriginalName()); 
            $file-> move($filePath, $filename); 
            $post->image = $filename; 
        }

        $post->save();
        return response()->json(['message'=>"Post is already stored"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::FindOrFail($id);
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
        $post = Post::FindOrFail($id);
        $post->title = $request->title;
        $post->description = $request-> description;
        $post->user_id = $request->user_id;

        $file = $request->file('image'); 
        $filePath = public_path('/Image'); 
        if($file){ 
            $filename= uniqid() . '-' .trim($file->getClientOriginalName()); 
            $file-> move($filePath, $filename); 
            $post->image = $filename; 
        }

        $post->save();
        return response()->json(['message'=>"Post is already updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::delete($id);
    }
}

