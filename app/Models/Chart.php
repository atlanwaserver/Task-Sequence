<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'station_id',
        'task_time',
        'method_time',
        'shift',
        'date',
        'project',
    ];
}
