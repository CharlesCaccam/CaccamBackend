<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController
{
    public function index()
    {
        return response()->json(Course::all());
    }
}