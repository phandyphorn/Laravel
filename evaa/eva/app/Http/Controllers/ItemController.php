<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\items;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return items::all();
        return items::with('users','categories')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new items;
        $item->name = $request->name; //$request = item submit
        $item->price = $request->price; 
        $item->user_id = $request-> user_id;
        $item->category_id = $request->category_id;
        $item->save();
        return response()->json(['message'=>"items saved successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return items::findOrFail($id);
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
        $item = items::findOrFail($id);
        $item->name = $request->name; //$request = item submit
        $item->price = $request->price; 
        $item->user_id = $request-> user_id;
        $item->category_id = $request->category_id;
        $item->save();
        return response()->json(['message'=>"items saved successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return items::destroy($id);
    }
}
