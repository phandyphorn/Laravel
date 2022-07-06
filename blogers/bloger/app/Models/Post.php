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
        'image',
        'user_id'
    ];

     // mean post ban mean comment, so post are bigger than comments. So post hasMany comment.
     public function comments()
     {
         return $this->hasMany(Comment::class, 'post_id');
     }
     // mean use terb mean post, so post trov belong to user (user is bigger than post)
     public function users(){
         return $this->belongsTo(User::class, 'user_id');
     }
}
