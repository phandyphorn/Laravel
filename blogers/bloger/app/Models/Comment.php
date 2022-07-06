<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    Protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    public function users(){
        return $this->belongsTo(Comment::class, 'user_id');
    }


    public function posts(){
        return $this->belongsTo(Post::class, 'user_id');
    }
}
