<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'is_read',
        'type'
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_read' => 'boolean'
    ];
} 