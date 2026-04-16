<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        return view('student.teachers.index');
    }

    public function show($teacher)
    {
        return view('student.teachers.show');
    }
}
