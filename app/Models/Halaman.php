<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Halaman extends Model
{
    use HasFactory;

    protected $table = 'halamans';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category',
        'is_published',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}