<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'title'=>'required|unique:posts|min:5|max:100',
            'description'=>'required|min:10|max:50'
        ],
        [
            'title.max'=>'It must be less than 100',
            'description.max'=>'It must be less than 50'
        ]
        );
        $post = new Post();
        // Near post is in table, near request is the field input.
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request-> description;
        $post->save();
        return response()->json(['message'=>"post added successfully!"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return Post::findOrFail($id);
        // return Post::with('users','comments')->get();
        return Post::findOrFail($id)::with('users','comments')->get();
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
            'title'=>'required|unique:posts|min:5|max:100',
            'description'=>'required|min:10|max:50'
        ],
        [
            'title.min'=> 'It must be more than 5.',
            'title.max'=>'It must be less than 100',
            'description.max'=>'It must be less than 50'
        ]
        );

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request-> description;
        $post->save();
        return response()->json(['message'=>"post updated successfully!"]);
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
}
