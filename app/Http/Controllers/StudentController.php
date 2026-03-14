<?php
namespace App\Http\Controllers;
use App\Models\Student;

class StudentController
{
    public function index()
    {
        return response()->json(Student::all());
    }
}