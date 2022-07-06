<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function getItem(){
        // return DB::table('items')->get();

        // return DB::table('items')->whereBetween('id',[1,2])->get();

        // return DB::table('items')->whereNotBetween('id',[1,5])->get();

        // return DB::table('items')->whereIn('id',[1,7])->get();

        // ============================================================
        // return DB::table('items')->orderBy('id')->get();
        // return DB::table('items')->orderByDesc('id')->get();
        // return DB::table('items')->orderBy('id', 'asc')->get();
        // return DB::table('items')->orderBy('id', 'desc')->get();
        // return DB::table('items')->inRandomOrder()->get();

        // ===========================================================
        // return DB::table('items')->count('id');
        // return DB::table('items')->max('id');
        // return DB::table('items')->min('id');
        // return DB::table('items')->sum('id');
        // return DB::table('items')->avg('id');

        return DB::table('items')->skip (1)->take(2)->get();






    }
}