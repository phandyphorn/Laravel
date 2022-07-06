<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Comment;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id',
        'text',
        'posts', 
        'comments'
    ];

    
    public function users(){
        return $this->belongsTo(Comment::class, 'user_id');
    }


    public function posts(){
        return $this->belongsTo(Post::class, 'user_id');
    }

  
}
