<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    Protected $fillable = [
        'post_id',
        'user_id',
        'text'
    ];

    public function posts(){
        return $this->belongsTo(post::class, 'user_id');
    }

    public function users(){
        return $this->belongsTo(Comment::class, 'user_id');

    }

}
