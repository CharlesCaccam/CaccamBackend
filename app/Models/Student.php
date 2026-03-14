<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'course_code',
        'year_level',
        'municipality',
        'enrollment_date',
    ];
}
