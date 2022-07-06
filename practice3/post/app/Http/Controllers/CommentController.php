<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
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
            'post_id'=>'integer|required|min:1|max:10',
            'text'=>'string|required|min:3|max:10'
        ],
        [
            'post_id.min'=> "Id must be more than 1.",
            'text.max'=>"Text must be less than 10"
        ]
        );
        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->text = $request->text;

        $comment->save();
        return response()->json(['message'=>"Comment saved successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Comment::findOrFail($id);
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
            'post_id'=>'integer|required|min:1|max:10',
            'text'=>'string|required|min:3|max:10'
        ],
        [
            'post_id.min'=> "Id must be more than 1.",
            'text.max'=>"Text must be less than 10"
        ]
        );
        $comment = Comment::findOrFail($id);
        $comment->text = $request->text;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->save();
        return response()->json(['message'=>"Comment updated successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Comment::destroy($id);
    }
}


