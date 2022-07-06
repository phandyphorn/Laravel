<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    Protected $fillable = [
        'title',
        'description',
        'user_id'
    ];

    public function comments(){
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function users(){
        return $this->belongsTo(user::class, 'user_id');
    }

    public function likes(){
        return $this->hasMany(like::class, 'post_id');
    }


    
}
