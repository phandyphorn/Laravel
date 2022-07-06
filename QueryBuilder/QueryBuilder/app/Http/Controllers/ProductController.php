<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// teacher add 
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProduct(){
        $product = DB::select('SELECT * FROM products');
        print_r($product);
        // or
        dd($product);
        // or

        // select all
        return DB::select('SELECT * FROM products');

        // select Only one
        return DB::selectOne('SELECT * FROM products');

        // Select query basic with where condition
        // return DB::select('SELECT * FROM products');
        // return DB::selectOne('SELECT * FROM products');
        // return DB::select('SELECT * FROM Products WHERE id =2');
        // return DB::select('SELECT * FROM Products WHERE id = ?',[2]);
        // return DB::select('SELECT * FROM Products WHERE id = :id',['id'=>2]);

        // =====================INSERT============================================
        $result = DB::insert('INSERT INTO Products (name,price) VALUES (?,?)', ["Pencil",3000]);
        dd($result);

        // =======================Update=============================================
        $result = DB::update('UPDATE Products SET name=?, price=? WHERE id=?', ["Pen",1000, 1]);
        dd($result);


        // =====================Delete=============================================
        $result = DB::delete('DELETE FROM Products WHERE id=?', [2]);
        dd($result);

        // ===========================Table Query Basic================================================
        // Get all data
        return DB::table('Products')->get();

        // Get only what we created
        return DB::table('Products')->select('name','price')->get();

        // Table query basic with WHERE conditionable
        return DB::table('Products')->where('id','>',10)->get();
        return DB::table('Product')->where('id',10)->get();
        return DB::table('Product')->where('id','=',10)->get();

        // get the first
        return DB::table('Products')->first();

        // get via value query
        return DB::table('Products')->find(10);

        // get via column
        return DB::table('Products')->value('name');
    }
}
