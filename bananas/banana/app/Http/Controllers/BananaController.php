<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banana;

class BananaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Banana::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banana = new Banana();

        $banana->name = $request->name; //$request = user submit
        $banana->price = $request-> price;
        $banana->status = $request->status;
        $banana->image = $request->image;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('storage/Image'), $filename);
            $banana['image']= $filename;
        }

        $banana->save();
        return response()->json(['message'=>"Banana saved successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ban = Banana::where('id','=',$id)->get();
        if (count($ban) <= 0){
            return response()->json(['message'=>"Banana not found"]);
        }else {
            return response()->json(Banana::findOrFail($id));
        }
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
        $banana = Banana::findOrFail($id);
        $banana->name = $request->name; //$request = user submit
        $banana->price = $request-> price;
        $banana->status = $request->status;
        $banana->image = $request->image;
        $banana->save();

        return response()->json(['message'=>"Banana updated successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ban = Banana::where('id','=',$id)->get();
        if (count($ban) > 0){
            return response()->json(['message'=>"Deleted successfully"]);
        }else {
            Banana::destroy($id);
            return response()->json(['message'=>"NO NO NO successfully"]);
        }
    }
}
