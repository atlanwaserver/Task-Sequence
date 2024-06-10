<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weldgun1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'pulse',
        'cycle',
        'current_value',
        'angle',
    ];
}
