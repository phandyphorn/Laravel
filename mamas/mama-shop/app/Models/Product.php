<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    Protected $fillable = [
        'name','price','category_id','user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
   
    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
