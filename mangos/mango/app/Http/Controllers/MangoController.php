<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mango;


class MangoController extends Controller
{
    public function getInfo(){
        // return DB::table('mangos')->get(); 
        return Mango::all();
        // return Mango::get();
        // return DB::table('mangos')->first(); // or we use Mango::first();

        // return DB::table('mangos')->select('name', 'price')->get(); //get only column you want.
        // or
        // return Mango::all('name', 'price');

        // return DB::table('mangos')->where ('id', '>',10)->get();
        // or
        // return Mango::where ('id', '<', 5)->get();

        // return DB::table ('mangos')->whereBetween('id', [1,5])->get();
        // or
        // return Mango::whereBetween('id', [1,5])->get();

        // return DB::table ('mangos')->whereNotBetween('id', [1,5])->get();
        // or
        // return Mango::whereNotBetween('id', [1,5])->get();

        // return DB::table ('mangos')->whereIn('id', [1,2,3])->get();
        // or
        // return Mango::find([1,2,3,4]);

        // return DB::table ('mangos')->orderBy('id', 'asc')->get();

        // return DB::table('mangos')->inRandomOrder()->get();

        // return DB::table('mangos')->max('id');
        // or
        // return Mango::max('id');

        // return DB::table('mangos')->min('id');

        // return DB::table('mangos')->avg('id');

        // return DB::table('mangos')->skip (5)->take(5)->get();
        // or
        // return Mango::skip(5)->take(5)->get();

        // return Mango::take(3)->get();

       }
}
