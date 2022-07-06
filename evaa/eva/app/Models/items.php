<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'price',
        'user_id'
    ];

    public function users(){
        return $this->belongsTo(items::class, 'user_id');
    }


    public function categories(){
        return $this->belongsTo(category::class, 'user_id');
    }
}

