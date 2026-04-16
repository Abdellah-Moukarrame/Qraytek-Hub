<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    public function index()
    {
        return view('teacher.courses.index');
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store()
    {
        // logic later
    }

    public function show($course)
    {
        return view('teacher.courses.show');
    }

    public function edit($course)
    {
        return view('teacher.courses.edit');
    }

    public function update($course)
    {
        // logic later
    }

    public function destroy($course)
    {
        // logic later
    }
}
