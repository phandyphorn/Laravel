<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PostController extends Controller
{

    public function comment():HasOne {
        return $this->belongsTo(Comment::class);
    }
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();

        // return Post::get();

        // return DB::table('posts')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ====================================
        $post = new Post;
        $post->title = $request->title; //$request = user submit
        $post->description = $request-> description;
        $post->save();
        return response()->json(['message'=>"Post saved successfully"]);
        // ====================================

        // Post::create($request->all());
        // return response()->json(['message'=> 'Post saved successfully!'], 201);
        // ====================================
        // Post::create([
        //     'title'=> $request->input('title'),
        //     'description'=> $request->input('description'),
        // ]);
        // return response()->json(['message'=> 'Post saved successfully!'], 201);

        // ===================================
        // Post::create([
        //     'title'=> $request->title,
        //     'description'=> $request->description,
        // ]);
        // return response()->json(['message'=> 'Post saved successfully!'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // ====================================
        // return Post::findOrFail($id);
        // ====================================
        // return DB::table('posts')->where('id','=',$id)->get();
        // ====================================
        return Post::where('id','=',$id)->get();

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
        // ================================
        // $post = Post::findOrFail($id);
        // $post->title = $request->title; //$request = user submit
        // $post->description = $request-> description;
        // $post->save();
        // return response()->json(['message'=>"Post updated successfully"]);
        // ================================
        // $post = Post::find($id);
        // $post->title = $request->title; //$request = user submit
        // $post->description = $request-> description;
        // $post->save();
        // return response()->json(['message'=>"Post updated successfully"]);
        // ================================
        // $post = DB::table('posts')->findOrFail($id);
        // $post->title = $request->title; //$request = user submit
        // $post->description = $request-> description;
        // $post->save();
        // return response()->json(['message'=>"Post updated successfully"]);
        // // $post = Post::where('id',$id)->update(['title'=>$title, 'description'=>$description]);
        // // $post->save();
        // // return response()->json(['message'=>"Post updated successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    // ==============================
        // return Post::destroy($id);
    // ==============================
        // return Post::find($id)->delete();
    // ==============================
    return Post::destroy($id);
    // ==============================
    }
}
