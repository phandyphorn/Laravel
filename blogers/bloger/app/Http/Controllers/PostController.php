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
        return Post::with('comments','users')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title; //$request = user submit
        $post->description = $request-> description;
        // Upload image
        // ==
        $file = $request->file('image'); 
        $filePath = public_path('/Image'); 
        if($file){ 
            $filename= uniqid() . '-' .trim($file->getClientOriginalName()); 
            $file-> move($filePath, $filename); 
            $post->image = $filename; 
        }
        // == Orr
        // $post->image = $request->file('image')->store('public');
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json(['message'=>"Post saved successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Post::findOrFail($id);
        // return Post::with('comments','users')->findOrFail($id); 
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
        $post = Post::findOrFail($id);
        $post->title = $request->title; //$request = user submit
        $post->description = $request-> description;
        $file = $request->file('image'); 
        $filePath = public_path('/Image'); 
        if($file){ 
            $filename= uniqid() . '-' .trim($file->getClientOriginalName()); 
            $file-> move($filePath, $filename); 
            $post->image = $filename; 
        }
        $post->user_id = $request->user_id;
        $post->save();
        return response()->json(['message'=>"Post saved successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Post::destroy($id);
    }

    
    public function search($title){
        return Post::where('title','LIKE','%'.$title.'%')->get();
    }
}



