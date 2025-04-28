<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Add the columns you want to fill here
    ];

    // Define any relationships if needed, for example:
    // public function subjects() {
    //     return $this->hasMany(Subject::class);
    // }
}
