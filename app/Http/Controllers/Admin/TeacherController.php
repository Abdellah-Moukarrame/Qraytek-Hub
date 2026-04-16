<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teachers.index');
    }

    public function show($teacher)
    {
        return view('admin.teachers.show');
    }

    public function approve($teacher)
    {
        // logic later
    }

    public function reject($teacher)
    {
        // logic later
    }

    public function destroy($teacher)
    {
        // logic later
    }
}
