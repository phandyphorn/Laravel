<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'random_date',
        'status',
        'photo'
    ];

    // Make boolean to false or true (if no it it will show only 0 and 1)
    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'date: d, l , M ,Y H:i:s A ',
    ];
}
