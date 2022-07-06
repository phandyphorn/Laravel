<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getAllItem(){
        return "All items";
    }

    public function creatItem(){
        return "Create a new item";
    }

    public function getOneItem($id){
        return "One item ".$id;
    }

    public function updateItem(){
        return "Update item";
    }

    public function deleteItem($id){
        return "Delete item ".$id;
    }
}
