<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

{
    $gradeLevels = ['Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 'Grade 11', 'Grade 12'];
    return view('grades.add', compact('gradeLevels'));
}
