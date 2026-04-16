<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return view('student.courses.index');
    }

    public function show($course)
    {
        return view('student.courses.show');
    }
}
