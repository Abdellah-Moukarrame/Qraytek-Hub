<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        return view('teacher.students.index');
    }

    public function show($student)
    {
        return view('teacher.students.show');
    }
}
