<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB; // no true or false
use App\Models\Person; //help to have true or false

class PersonalController extends Controller
{
    public function getInfo() {
    // return DB::select('SELECT * FROM people WHERE id = 10'); //no true of false
    return Person::all(); //help to have true or false
    }
}
