<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    // Fillable fields for mass assignment
    protected $fillable = [
        'name',
        'email',
        'password',
        'images',
    ];

    // Cast images column to array
    protected $casts = [
        'images' => 'array',
    ];
}
