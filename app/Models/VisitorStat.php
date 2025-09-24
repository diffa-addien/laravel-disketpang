<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorStat extends Model
{
    use HasFactory;
    protected $table = 'visitor_stats';
    protected $fillable = ['visit_date', 'visits'];
    protected $casts = ['visit_date' => 'date'];
}